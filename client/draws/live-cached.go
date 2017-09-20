package draws

import (
	"fmt"
	"github.com/sirupsen/logrus"
	"sync"
	"time"
)

// Cache caches another Fetchers results
type Cache struct {
	sync.RWMutex
	Feed   Fetcher
	Cache  map[string]Result
	Logger *logrus.Logger
}

// Update updates the cache
func (c Cache) Update() error {
	res, err := c.Feed.GetAll()
	if err != nil {
		return err
	}
	c.Lock()
	for _, r := range res {
		c.Cache[r.Key] = r
	}
	c.Unlock()
	return nil
}

// Monitor ticks every 30 seconds to trigger a cache update. This could be done with a retry-backoff algorithm as well.
func (c Cache) Monitor() {
	for range time.Tick(time.Second * 30) {
		err := c.Update()
		if err != nil {
			c.Logger.Error(err)
		}
	}
}

// GetAll returns all Results in the cache
func (c Cache) GetAll() (res []Result, err error) {
	c.RLock()
	for _, r := range c.Cache {
		res = append(res, r)
	}
	c.RUnlock()
	return
}

// ByKey returns a result by key
func (c Cache) ByKey(key string) (res Result, err error) {
	c.RLock()
	defer c.RUnlock()
	res, ok := c.Cache[key]
	if !ok {
		err = fmt.Errorf("No result found for key: %s", key)
	}
	return
}

// NewCachedFeed returns a cached feed fetcher
func NewCachedFeed(feed Fetcher, logger *logrus.Logger) Fetcher {
	c := Cache{
		Cache:  map[string]Result{},
		Feed:   feed,
		Logger: logger,
	}
	c.Update()
	go c.Monitor()
	return c
}

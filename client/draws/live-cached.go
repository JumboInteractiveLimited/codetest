package draws

import (
	"fmt"
	"sync"
)

// Cache caches another Fetchers results
type Cache struct {
	sync.RWMutex
	Feed  Fetcher
	Cache map[string]Result
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
func NewCachedFeed(feed Fetcher) Fetcher {
	c := Cache{
		Cache: map[string]Result{},
		Feed:  feed,
	}
	c.Update()
	return c
}

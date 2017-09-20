package draws

import (
	"encoding/json"
	"fmt"
	"github.com/sirupsen/logrus"
	"net/http"
)

// ResultsLiveFeed is a fetcher that works directly on the external feed
type ResultsLiveFeed struct {
	FeedServerPath string
	Logger         *logrus.Logger
}

// getData fetches the data from the feed
func (r ResultsLiveFeed) getData() (jsonData Reponse, err error) {
	resp, err := http.Get(r.FeedServerPath)
	if err != nil {
		return
	}

	jsonData = Reponse{}
	err = json.NewDecoder(resp.Body).Decode(&jsonData)
	return
}

// GetAll returns all results
func (r ResultsLiveFeed) GetAll() (res []Result, err error) {
	jsonData, err := r.getData()
	res = jsonData.Results
	return
}

// ByKey returns a Result by key
func (r ResultsLiveFeed) ByKey(key string) (res Result, err error) {
	resp, err := http.Get(r.FeedServerPath)
	if err != nil {
		return
	}

	jsonData := Reponse{}
	err = json.NewDecoder(resp.Body).Decode(&jsonData)
	if err != nil {
		return
	}

	for _, r := range jsonData.Results {
		if r.Key == key {
			return r, nil
		}
	}
	return Result{}, fmt.Errorf("No result found for key: %s", key)
}

// NewLiveFeed returns a new live feed fetcher
func NewLiveFeed(feedServerPath string, logger *logrus.Logger) Fetcher {
	return ResultsLiveFeed{
		FeedServerPath: feedServerPath,
		Logger:         logger,
	}
}

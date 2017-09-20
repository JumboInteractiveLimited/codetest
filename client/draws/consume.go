package draws

import "github.com/fromz/codetest/client/results"

// Fetcher fetches results
type Fetcher interface {
	GetAll() ([]Result, error)
	ByKey(key string) (Result, error)
}

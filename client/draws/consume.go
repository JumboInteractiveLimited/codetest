package draws

// Fetcher fetches results
type Fetcher interface {
	GetAll() ([]Result, error)
	ByKey(key string) (Result, error)
}

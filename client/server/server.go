package server

import (
	"github.com/davecgh/go-spew/spew"
	"github.com/fromz/codetest/client/draws"
	"html/template"
	"net/http"
	"path/filepath"
	"sort"
)

// HTML is the server type for HTML
type HTML struct {
	Fetcher draws.Fetcher
	// TODO implement a cache for parsed templates, with a goroutine monitoring either inotify refreshing the templates, or every x seconds rebuild
	TemplatePath        string
	ParsedErrorTemplate *template.Template
}

// ListData is the data for the List template
type ListData struct {
	Results []draws.Result
}

// List renders the list template
func (s HTML) List(w http.ResponseWriter, r *http.Request) {
	res, err := s.Fetcher.GetAll()
	if err != nil {
		s.Error500(w, err, "")
		return
	}

	// Sort alphabetically
	sort.Slice(res, func(i, j int) bool {
		return res[i].Name < res[j].Name
	})

	t, err := template.ParseFiles(filepath.Join(s.TemplatePath, "list.html.tmpl"))
	if err != nil {
		s.Error500(w, err, "")
		return
	}

	t.Execute(w, ListData{
		Results: res,
	})
}

// KeyData is the data for the Key template
type KeyData struct {
	Dump   string
	Result draws.Result
}

// Key renders the Key template
func (s HTML) Key(w http.ResponseWriter, r *http.Request) {
	key := r.URL.Path[len("/key/"):]
	res, err := s.Fetcher.ByKey(key)
	if err != nil {
		s.Error500(w, err, "")
		return
	}

	str := spew.Sdump(res)

	t, err := template.ParseFiles(filepath.Join(s.TemplatePath, "by-key.html.tmpl"))
	if err != nil {
		s.Error500(w, err, "")
		return
	}

	t.Execute(w, KeyData{
		Dump:   str,
		Result: res,
	})
}

// ErrorData is the data for the error template
type ErrorData struct {
	Message string
}

// Error500 renders the error 500 template
func (s HTML) Error500(w http.ResponseWriter, err error, msg string) {
	s.ParsedErrorTemplate.Execute(w, ErrorData{
		Message: msg,
	})
}

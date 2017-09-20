package main

import (
	"github.com/fromz/codetest/client/draws"
	"github.com/fromz/codetest/client/server"
	"html/template"
	"net/http"
	"path/filepath"
)

func main() {
	//run a web server

	templatePath := "templates"
	feedServerPath := "http://127.0.0.1:80/"
	bindTo := ":8081"
	cacheFeed := true

	// Parse the error template in advance in case the error its attempting to display is due to templates not being found
	t, err := template.ParseFiles(filepath.Join(templatePath, "error-500.html.tmpl"))
	if err != nil {
		return
	}

	fetcher := draws.NewLiveFeed(feedServerPath)
	if cacheFeed {
		fetcher = draws.NewCachedFeed(fetcher)
	}

	// Prepare a server and register its methods as handlers
	s := server.HTML{
		Fetcher:             fetcher,
		TemplatePath:        templatePath,
		ParsedErrorTemplate: t,
	}
	http.HandleFunc("/", s.List)
	http.HandleFunc("/key/", s.Key)
	http.ListenAndServe(bindTo, nil)
}

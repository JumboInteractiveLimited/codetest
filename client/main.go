package main

import (
	"github.com/fromz/codetest/client/draws"
	"github.com/fromz/codetest/client/server"
	"github.com/sirupsen/logrus"
	"github.com/spf13/pflag"
	"github.com/spf13/viper"
	"html/template"
	"net/http"
	"os"
	"path/filepath"
)

func main() {
	// Pass a logger around for centralized logging if necessary
	logger := logrus.New()

	// Viper allows us to migrate to YAML or TOML files fairly easily
	pflag.String("templatePath", "templates", "The path to the templates directory")
	pflag.String("feedServerPath", "http://127.0.0.1:80/", "The feed server address")
	pflag.String("bindTo", ":8081", "The TCP info to bind to")
	pflag.Bool("cacheFeed", true, "Whether or not to locally cache the feed")
	pflag.Parse()
	err := viper.BindPFlags(pflag.CommandLine)
	if err != nil {
		logger.Error(err)
		os.Exit(1)
	}

	// Bind the passed in config to local variables
	templatePath := viper.GetString("templatePath")
	feedServerPath := viper.GetString("feedServerPath")
	bindTo := viper.GetString("bindTo")
	cacheFeed := viper.GetBool("cacheFeed")

	// Parse the error template in advance in case the error its attempting to display is due to templates not being found
	t, err := template.ParseFiles(filepath.Join(templatePath, "error-500.html.tmpl"))
	if err != nil {
		logger.Error(err)
		os.Exit(1)
	}

	// Prepare a Draws fetcher for use by the HTML server
	fetcher := draws.NewLiveFeed(feedServerPath, logger)
	if cacheFeed {
		fetcher = draws.NewCachedFeed(fetcher, logger)
	}

	// Prepare a server and register its methods as handlers. if more complicated, I'd utilize a framework.
	s := server.HTML{
		Fetcher:             fetcher,
		TemplatePath:        templatePath,
		ParsedErrorTemplate: t,
	}
	http.HandleFunc("/", s.List)
	http.HandleFunc("/key/", s.Key)
	http.ListenAndServe(bindTo, nil)
}

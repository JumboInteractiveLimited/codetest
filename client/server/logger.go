package server

import (
	"github.com/sirupsen/logrus"
	"net/http"
)

var logger *logrus.Logger

// RegisterLogger makes logrus available locally
func RegisterLogger(logrus *logrus.Logger) {
	logger = logrus
}

// Logger wrapper
func Logger(h http.Handler) http.Handler {
	return http.HandlerFunc(func(w http.ResponseWriter, r *http.Request) {
		logger.Infof("Serving request %s", r.URL.Path)
		h.ServeHTTP(w, r)
	})
}

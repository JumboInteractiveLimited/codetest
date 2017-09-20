# codetest
This project exists to serve as the server component of a code test. The project serves a HTTP json response from URL [http://localhost:8080](http://localhost:8080). The [response](json/response.json) will contain lotteries, game types and game offers.

The json document is in the /json directory of this project.

The project is written in golang. To build and run the example you will need to install [docker](https://docs.docker.com/engine/installation/).

# Build
Before you run the container you need to build the source code for the conainer.

## Container build

Creates a statically linked binary for linux because docker runs under linux.

```bash
 ./build.sh
```

# Run
The program runs in docker and exposes the service on port :8080 on localhost.

```bash
 ./run.sh
```

To access [http://localhost:8080](http://localhost:8080)

# Development

## Git 
Add git hooks
```bash
ln -s `pwd`/hooks/pre-commit .git/hooks
```

## Local build

```bash
go get -v ./... && go build -v
```

# Running the client
Available in client/ dir. `go run main.go` will use defaults that work on most systems, otherwise arguments are available.
* `/` is a list that links to the key/ template
* `/key/RESULT.KEY`
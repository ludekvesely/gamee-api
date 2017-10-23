# Gamee API

Simple API for storing game results and retrieving top 10 scores.

## Requirements

* Docker

## Usage

```bash
# start stack (php and redis)
docker-compose up -d

# test app with demo data
bin/demo
```

## API

* JSON-RPC 2.0

```js
// create new score
POST http://localhost:8087 
{
    "jsonrpc": "2.0",
    "method": "createScore",
    "id": 1,
    "params": {
        "gameId": 1,
        "userId": 7,
        "score": 27
    }
}

// response
{
    "jsonrpc": "2.0",
    "result": {
        "gameId": 1,
        "userId": 7,
        "score": 27
    },
    "id": 1
}


// get top ten users
POST http://localhost:8087 
{
    "jsonrpc": "2.0",
    "method": "getTopTenScores",
    "id": 2,
    "params": {
        "gameId": 1
    }
}

// response
{
    "jsonrpc": "2.0",
    "result": {
        "gameId": 1,
        "topUsers": [
            {
                "userId": 7,
                "score": 508,
                "order": 1
            },
            {
                "userId": 3,
                "score": 476,
                "order": 2
            }
        ]
    }, 
    "id": 2
}
```

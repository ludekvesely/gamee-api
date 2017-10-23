# Gamee API

Simple API for storing scores and retrieving top 10 scores.

## Requirements

* PHP >= 7.1
* Composer
* Redis

## Start application

```bash
php -S 127.0.0.1:8000 -t web web/index.php
open http://127.0.0.1:8000
```

## API

* JSON-RPC 2.0

```js
// create new score
POST http://127.0.0.1:8000 
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
        "userId": 7,
        "gameId": 1,
        "score": 27
    },
    "id": 1
}


// get top ten users
POST http://127.0.0.1:8000 
{
    "jsonrpc": "2.0",
    "method": "getTopTenScores",
    "id": 2
}

// response
{
    "jsonrpc": "2.0",
    "result": [
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
    ],
    "id": 2
}
```

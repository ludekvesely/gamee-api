<?php

declare(strict_types = 1);

namespace GameeApi\Scores;

class CreateScore extends RedisClient
{
    public function __invoke($gameId, $userId, $score): array
    {
        $this->validateRequiredInt('gameId', $gameId);
        $this->validateRequiredInt('userId', $userId);
        $this->validateRequiredInt('score', $score, true);

        $this->redisClient->zadd($gameId, $score, $userId);

        return [
            'userId' => $userId,
            'gameId' => $gameId,
            'score' => $score
        ];
    }
}

<?php

declare(strict_types = 1);

namespace GameeApi\Scores;

class CreateScore extends RedisClient
{
    public function __invoke($userId, $gameId, $score): array
    {
        $this->validateRequiredInt('userId', $userId);
        $this->validateRequiredInt('gameId', $gameId);
        $this->validateRequiredInt('score', $score, true);

        $this->redisClient->zadd($gameId, $score, $userId);

        return [
            'userId' => $userId,
            'gameId' => $gameId,
            'score' => $score
        ];
    }
}

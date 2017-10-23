<?php

declare(strict_types = 1);

namespace GameeApi\Scores;

use Predis\Client;

class CreateScore
{
    private $redisClient;

    public function __construct(Client $redisClient)
    {
        $this->redisClient = $redisClient;
    }

    public function __invoke(int $userId, int $gameId, int $score): array
    {
        $dto = [
            'userId' => $userId,
            'gameId' => $gameId,
            'score' => $score
        ];

        $this->redisClient->zadd($gameId, $score, $userId);

        return $dto;
    }
}

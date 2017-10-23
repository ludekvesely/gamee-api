<?php

declare(strict_types=1);

namespace GameeApi\Scores;

class CreateScore
{
    public function __invoke(int $userId, int $gameId, int $score): array
    {
        return [
            'userId' => $userId,
            'gameId' => $gameId,
            'score' => $score
        ];
    }
}

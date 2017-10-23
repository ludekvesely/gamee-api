<?php

declare(strict_types = 1);

namespace GameeApi\Scores;

class GetTopTenScores extends RedisClient
{
    public function __invoke($gameId): array
    {
        $this->validateRequiredInt('gameId', $gameId);
        $foundScores = $this->redisClient->zrevrange($gameId, 0, 9, 'WITHSCORES');

        $topTenUsers = [];
        $order = 0;
        $prevScore = null;

        foreach ($foundScores as $userId => $score) {
            if ($score !== $prevScore) {
                $order++;
            }

            $topTenUsers[] = [
                'userId' => $userId,
                'score' => (int) $score,
                'order' => $order
            ];

            $prevScore = $score;
        }

        return [
            'gameId' => $gameId,
            'topUsers' => $topTenUsers
        ];
    }
}

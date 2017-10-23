<?php

declare(strict_types = 1);

namespace GameeApi\Scores;

use Predis\Client;

class GetTopTenScores
{
    private $redisClient;

    public function __construct(Client $redisClient)
    {
        $this->redisClient = $redisClient;
    }

    public function __invoke()
    {
        return [
            [
                'userId' => 7,
                'score' => 508,
                'order' => 1
            ],
            [
                'userId' => 3,
                'score' => 508,
                'order' => 2
            ]
        ];
    }
}

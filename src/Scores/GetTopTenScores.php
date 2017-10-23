<?php

declare(strict_types=1);

namespace GameeApi\Scores;

class GetTopTenScores
{
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

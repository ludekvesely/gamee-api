<?php

declare(strict_types = 1);

namespace GameeApi\Scores;

use GameeApi\Exceptions\InvalidParameterException;
use Predis\Client;

class CreateScore
{
    private $redisClient;

    public function __construct(Client $redisClient)
    {
        $this->redisClient = $redisClient;
    }

    public function __invoke($userId, $gameId, $score): array
    {
        $this->validateRequiredInt('userId', $userId);
        $this->validateRequiredInt('gameId', $gameId);
        $this->validateRequiredInt('score', $score, true);

        $dto = [
            'userId' => $userId,
            'gameId' => $gameId,
            'score' => $score
        ];

        $this->redisClient->zadd($gameId, $score, $userId);

        return $dto;
    }

    /**
     * @throws InvalidParameterException
     */
    private function validateRequiredInt(string $name, $value, bool $allowedZero = false)
    {
        if (!is_int($value)) {
            throw new InvalidParameterException("Parameter $name must be integer");
        }

        if ($allowedZero && ($value < 0)) {
            throw new InvalidParameterException("Parameter $name must be greater or equal to zero");
        }

        if (!$allowedZero && ($value <= 0)) {
            throw new InvalidParameterException("Parameter $name must be greater than zero");
        }
    }
}

<?php

declare(strict_types = 1);

namespace GameeApi\Scores;

use GameeApi\Exceptions\InvalidParameterException;
use Predis\Client;

abstract class RedisClient
{
    protected $redisClient;

    public function __construct(Client $redisClient)
    {
        $this->redisClient = $redisClient;
    }

    /**
     * @throws InvalidParameterException
     */
    protected function validateRequiredInt(string $name, $value, bool $allowedZeroValue = false)
    {
        if (!is_int($value)) {
            throw new InvalidParameterException("Parameter $name must be integer");
        }

        if ($allowedZeroValue && ($value < 0)) {
            throw new InvalidParameterException("Parameter $name must be greater or equal to zero");
        }

        if (!$allowedZeroValue && ($value <= 0)) {
            throw new InvalidParameterException("Parameter $name must be greater than zero");
        }
    }
}

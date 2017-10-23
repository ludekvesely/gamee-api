<?php

declare(strict_types = 1);

namespace GameeApi\Presenters;

use Nette;
use Nette\Application\Responses;
use Tracy\ILogger;

class ErrorPresenter implements Nette\Application\IPresenter
{
    use Nette\SmartObject;

    /** @var ILogger */
    private $logger;

    public function __construct(ILogger $logger)
    {
        $this->logger = $logger;
    }

    public function run(Nette\Application\Request $request): Nette\Application\IResponse
    {
        $exception = $request->getParameter('exception');
        $this->logger->log($exception, ILogger::EXCEPTION);

        return new Responses\JsonResponse(
            [
                'status' => 'error',
                'message' => $exception
            ],
            'application/json'
        );
    }
}

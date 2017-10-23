<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$configurator = new Nette\Configurator;
$configurator->setTimeZone('Europe/Prague');
$configurator->enableTracy(__DIR__ . '/../var/log');
$configurator->setTempDirectory(__DIR__ . '/../var');
$configurator->createRobotLoader()->addDirectory(__DIR__)->register();
$configurator->addConfig(__DIR__ . '/../app/config/config.neon');

$container = $configurator->createContainer();

return $container;

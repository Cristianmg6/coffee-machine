#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';
use GetWith\CoffeeMachine\Console\Order\Infrastructure\ConsoleCommand\MakeDrinkCommand;
use Symfony\Component\Console\Application;

$application = new Application();

$application->add(new MakeDrinkCommand());

$application->run();

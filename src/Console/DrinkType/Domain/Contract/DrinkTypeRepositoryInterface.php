<?php

namespace GetWith\CoffeeMachine\Console\DrinkType\Domain\Contract;

use GetWith\CoffeeMachine\Console\DrinkType\Domain\Collection\DrinkTypeCollection;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\Entity\DrinkType;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\Exception\DrinkTypeNotFoundException;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\ValueObject\DrinkTypeName;

interface DrinkTypeRepositoryInterface
{
	/** @throws DrinkTypeNotFoundException */
	public function getByName(DrinkTypeName $name): DrinkType;
	public function getAll(): DrinkTypeCollection;
	
}
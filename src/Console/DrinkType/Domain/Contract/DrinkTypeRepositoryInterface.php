<?php

namespace GetWith\CoffeeMachine\Console\DrinkType\Domain\Contract;

use GetWith\CoffeeMachine\Console\DrinkType\Domain\Entity\DrinkType;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\ValueObject\DrinkTypeName;

interface DrinkTypeRepositoryInterface
{
	public function getByName(DrinkTypeName $name): DrinkType;
	
}
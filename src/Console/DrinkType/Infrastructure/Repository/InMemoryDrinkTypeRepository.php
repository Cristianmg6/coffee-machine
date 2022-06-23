<?php

namespace GetWith\CoffeeMachine\Console\DrinkType\Infrastructure\Repository;

use GetWith\CoffeeMachine\Console\DrinkType\Domain\Contract\DrinkTypeRepositoryInterface;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\Entity\DrinkType;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\ValueObject\DrinkTypeName;

class InMemoryDrinkTypeRepository implements DrinkTypeRepositoryInterface
{
	
	public function getByName(DrinkTypeName $name) : DrinkType
	{
		// TODO: Implement getByName() method.
	}
}
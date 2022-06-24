<?php

namespace GetWith\CoffeeMachine\Console\DrinkType\Infrastructure\Repository;

use GetWith\CoffeeMachine\Console\DrinkType\Domain\Contract\DrinkTypeRepositoryInterface;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\Entity\DrinkType;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\Exception\DrinkTypeNotFoundException;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\ValueObject\DrinkTypeCost;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\ValueObject\DrinkTypeId;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\ValueObject\DrinkTypeName;

class InMemoryDrinkTypeRepository implements DrinkTypeRepositoryInterface
{
	private array $drinkTypes = [
		"tea" => [
			"id" => 1,
			"name" => "tea",
			"cost" => 0.4
		],
		"coffee" => [
			"id" => 2,
			"name" => "coffee",
			"cost" => 0.5
		],
		"chocolate" => [
			"id" => 3,
			"name" => "chocolate",
			"cost" => 0.6
		]
	];
	
	/** @throws DrinkTypeNotFoundException */
	public function getByName(DrinkTypeName $name) : DrinkType
	{
		if(!key_exists($name->value(), $this->drinkTypes)){
			throw DrinkTypeNotFoundException::ofDrinkTypeNameNotFoundWithAvailableTypes();
		}else{
			$arrayDrinkType = $this->drinkTypes[$name->value()];
			return new DrinkType(
				new DrinkTypeId($arrayDrinkType['id']),
				new DrinkTypeName($arrayDrinkType['name']),
				new DrinkTypeCost($arrayDrinkType['cost'])
			);
		}
	}
	
	public function getAll() : array
	{
		// TODO: Implement getAll() method.
	}
}
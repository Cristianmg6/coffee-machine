<?php

namespace GetWith\CoffeeMachine\Console\DrinkType\Domain\Entity;

use GetWith\CoffeeMachine\Console\DrinkType\Domain\ValueObject\DrinkTypeCost;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\ValueObject\DrinkTypeId;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\ValueObject\DrinkTypeName;

final class DrinkType
{
	public function __construct(
		private DrinkTypeId $id,
		private DrinkTypeName $name,
		private DrinkTypeCost $cost
	){ }
	
	public function id() : DrinkTypeId
	{
		return $this->id;
	}
	
	public function name() : DrinkTypeName
	{
		return $this->name;
	}
	
	public function cost() : DrinkTypeCost
	{
		return $this->cost;
	}
	
	
}
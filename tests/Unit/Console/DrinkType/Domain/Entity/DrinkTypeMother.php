<?php

namespace GetWith\CoffeeMachine\Tests\Unit\Console\DrinkType\Domain\Entity;

use GetWith\CoffeeMachine\Console\DrinkType\Domain\Collection\DrinkTypeCollection;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\Entity\DrinkType;
use GetWith\CoffeeMachine\Tests\Unit\Console\DrinkType\Domain\ValueObject\DrinkTypeIdMother;
use GetWith\CoffeeMachine\Tests\Unit\Console\Shared\Domain\ValueObject\DrinkTypeCostMother;
use GetWith\CoffeeMachine\Tests\Unit\Console\Shared\Domain\ValueObject\DrinkTypeNameMother;

final class DrinkTypeMother
{
	public static function random(): DrinkType
	{
		return new DrinkType(
			DrinkTypeIdMother::random(),
			DrinkTypeNameMother::random(),
			DrinkTypeCostMother::random()
		);
	}
	public static function randomWithCost(float $cost): DrinkType
	{
		return new DrinkType(
			DrinkTypeIdMother::random(),
			DrinkTypeNameMother::random(),
			DrinkTypeCostMother::create($cost)
		);
	}
	
	public static function collectionOf(int $count): DrinkTypeCollection
	{
		$drinkTypes = new DrinkTypeCollection();
		
		for($i = 0; $i < $count; $i++){
			$drinkTypes->add(self::random());
		}
		return $drinkTypes;
	}
}
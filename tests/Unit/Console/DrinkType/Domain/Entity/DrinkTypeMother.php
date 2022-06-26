<?php

namespace GetWith\CoffeeMachine\Tests\Unit\Console\DrinkType\Domain\Entity;

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
}
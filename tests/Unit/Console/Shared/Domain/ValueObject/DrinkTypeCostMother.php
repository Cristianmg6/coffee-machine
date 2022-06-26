<?php

namespace GetWith\CoffeeMachine\Tests\Unit\Console\Shared\Domain\ValueObject;

use GetWith\CoffeeMachine\Console\Shared\Domain\ValueObject\DrinkTypeCost;
use GetWith\CoffeeMachine\Tests\Utils\Stubs\Shared\Domain\ValueObject\FloatMother;

final class DrinkTypeCostMother
{
	public static function create(float $cost): DrinkTypeCost
	{
		return new DrinkTypeCost($cost);
	}
	
	public static function random(): DrinkTypeCost
	{
		return self::create(FloatMother::random());
	}

	
}
<?php

namespace GetWith\CoffeeMachine\Tests\Unit\Console\DrinkType\Domain\ValueObject;

use GetWith\CoffeeMachine\Console\DrinkType\Domain\ValueObject\DrinkTypeId;
use GetWith\CoffeeMachine\Tests\Utils\Stubs\Shared\Domain\ValueObject\IntegerMother;

final class DrinkTypeIdMother
{
	public static function create(int $id): DrinkTypeId
	{
		return new DrinkTypeId($id);
	}
	
	public static function random(): DrinkTypeId
	{
		return self::create(IntegerMother::random());
	}
}
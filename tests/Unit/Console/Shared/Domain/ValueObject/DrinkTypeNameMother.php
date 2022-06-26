<?php

namespace GetWith\CoffeeMachine\Tests\Unit\Console\Shared\Domain\ValueObject;

use GetWith\CoffeeMachine\Console\Shared\Domain\ValueObject\DrinkTypeName;
use GetWith\CoffeeMachine\Tests\Utils\Stubs\Shared\Domain\ValueObject\StringMother;

final class DrinkTypeNameMother
{
	public static function create(string $name): DrinkTypeName
	{
		return new DrinkTypeName($name);
	}
	
	public static function random(): DrinkTypeName
	{
		return self::create(StringMother::random());
	}
	
}
<?php

namespace GetWith\CoffeeMachine\Console\DrinkType\Domain\Exception;

use Exception;

class DrinkTypeNotFoundException extends Exception
{
	
	public static function ofDrinkTypeNameNotFoundWithAvailableTypes(): DrinkTypeNotFoundException
	{
		return new self('The drink type should be tea, coffee or chocolate.');
	}
}
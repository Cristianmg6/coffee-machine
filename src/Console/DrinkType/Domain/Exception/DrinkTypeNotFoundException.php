<?php

namespace GetWith\CoffeeMachine\Console\DrinkType\Domain\Exception;

use Exception;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\Collection\DrinkTypeCollection;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\Entity\DrinkType;

class DrinkTypeNotFoundException extends Exception
{
	public static function ofDrinkTypeNameNotFoundWithAvailableTypes(DrinkTypeCollection $drinkTypes): DrinkTypeNotFoundException
	{
		$stringDrinkTypes = self::drinkTypesToString($drinkTypes);
		return new self(sprintf("The drink type should be %s", $stringDrinkTypes));
	}
	
	private static function drinkTypesToString(DrinkTypeCollection $drinkTypes): string
	{
		$stringDrinkTypes = "";
		/** @var DrinkType $drinkType */
		foreach($drinkTypes->getAll() as $i => $drinkType)
		{
			$name = $drinkType->name()->value();
			if($i === $drinkTypes->getCount()-1){
				$stringDrinkTypes = rtrim($stringDrinkTypes,",");
				$stringDrinkTypes .= " or " . $name . ".";
			}else{
				$stringDrinkTypes .= " " . $name . ",";
			}
		}
		return ltrim($stringDrinkTypes, " ");
	}
}
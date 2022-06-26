<?php

namespace GetWith\CoffeeMachine\Tests\Unit\Console\Order\Domain\Entity;

use GetWith\CoffeeMachine\Console\DrinkType\Domain\Entity\DrinkType;
use GetWith\CoffeeMachine\Console\Order\Domain\Entity\Order;
use GetWith\CoffeeMachine\Tests\Unit\Console\Order\Domain\ValueObject\OrderExtraHotMother;
use GetWith\CoffeeMachine\Tests\Unit\Console\Order\Domain\ValueObject\OrderMoneyMother;
use GetWith\CoffeeMachine\Tests\Unit\Console\Order\Domain\ValueObject\OrderSugarsMother;
use GetWith\CoffeeMachine\Tests\Unit\Console\Shared\Domain\ValueObject\DrinkTypeCostMother;
use GetWith\CoffeeMachine\Tests\Unit\Console\Shared\Domain\ValueObject\DrinkTypeNameMother;

final class OrderMother
{
	
	public static function randomCorrectWithDrinkType(DrinkType $drinkType): Order
	{
		return new Order(
			$drinkType->name(),
			$drinkType->cost(),
			OrderSugarsMother::create(1),
			OrderMoneyMother::create($drinkType->cost()->value() + 1),
			OrderExtraHotMother::create(true)
		);
	}
	
	public static function randomCorrect(): Order
	{
		return new Order(
			DrinkTypeNameMother::random(),
			DrinkTypeCostMother::create(0.4),
			OrderSugarsMother::randomInRange(),
			OrderMoneyMother::create(0.5),
			OrderExtraHotMother::random()
		);
	}
	
}
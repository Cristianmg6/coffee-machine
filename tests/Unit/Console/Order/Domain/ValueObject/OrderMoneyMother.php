<?php

namespace GetWith\CoffeeMachine\Tests\Unit\Console\Order\Domain\ValueObject;

use GetWith\CoffeeMachine\Console\Order\Domain\ValueObject\OrderMoney;
use GetWith\CoffeeMachine\Tests\Utils\Stubs\Shared\Domain\ValueObject\FloatMother;

final class OrderMoneyMother
{
	
	public static function create(float $money): OrderMoney
	{
		return new OrderMoney($money);
	}
	
	public static function random(): OrderMoney
	{
		return self::create(FloatMother::random());
	}
	
}
<?php

namespace GetWith\CoffeeMachine\Tests\Unit\Console\Order\Domain\ValueObject;

use GetWith\CoffeeMachine\Console\Order\Domain\ValueObject\OrderExtraHot;
use GetWith\CoffeeMachine\Tests\Utils\Stubs\Shared\Domain\ValueObject\BoolMother;

final class OrderExtraHotMother
{
	
	public static function create(bool $extraHot): OrderExtraHot
	{
		return new OrderExtraHot($extraHot);
	}
	
	public static function random(): OrderExtraHot
	{
		return self::create(BoolMother::random());
	}
}
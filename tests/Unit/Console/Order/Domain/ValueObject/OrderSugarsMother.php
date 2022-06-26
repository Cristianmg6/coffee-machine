<?php

namespace GetWith\CoffeeMachine\Tests\Unit\Console\Order\Domain\ValueObject;

use GetWith\CoffeeMachine\Console\Order\Domain\Exception\InvalidSugarQuantityException;
use GetWith\CoffeeMachine\Console\Order\Domain\ValueObject\OrderSugars;
use GetWith\CoffeeMachine\Tests\Utils\Stubs\Shared\Domain\ValueObject\IntegerMother;

final class OrderSugarsMother
{
	/**
	 * @throws InvalidSugarQuantityException
	 */
	public static function create(int $sugars): OrderSugars
	{
		return new OrderSugars($sugars);
	}
	
	public static function randomInRange(): OrderSugars
	{
		try{
			return self::create(IntegerMother::between(0, 2));
		}catch(InvalidSugarQuantityException $e){
		}
	}
	
	/**
	 * @throws InvalidSugarQuantityException
	 */
	public static function randomNotInRange(): OrderSugars
	{
		return self::create(IntegerMother::between(3,10));
	}
	
}
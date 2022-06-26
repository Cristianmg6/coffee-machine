<?php

namespace GetWith\CoffeeMachine\Console\Order\Domain\ValueObject;

use GetWith\CoffeeMachine\Console\Order\Domain\Exception\InvalidSugarQuantityException;

final class OrderSugars
{
	const MIN_QUANTITY_REQUIRED = 0;
	const MAX_QUANTITY_REQUIRED = 2;
	
	/** * @throws InvalidSugarQuantityException */
	public function __construct(private int $sugars)
	{
		if(!($this->sugars >= self::MIN_QUANTITY_REQUIRED && $this->sugars <= self::MAX_QUANTITY_REQUIRED)){
			throw new InvalidSugarQuantityException(self::MIN_QUANTITY_REQUIRED, self::MAX_QUANTITY_REQUIRED);
		}
	}
	
	public function value() : int
	{
		return $this->sugars;
	}
}
<?php

namespace GetWith\CoffeeMachine\Console\Order\Domain\ValueObject;

final class OrderSugars
{
	public function __construct(private int $sugars){ }
	
	public function value(): int
	{
		return $this->sugars;
	}
}
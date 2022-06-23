<?php

namespace GetWith\CoffeeMachine\Console\Order\Domain\ValueObject;

final class OrderMoney
{
	public function __construct(private float $money){ }
	
	public function value(): float
	{
		return $this->money;
	}
}
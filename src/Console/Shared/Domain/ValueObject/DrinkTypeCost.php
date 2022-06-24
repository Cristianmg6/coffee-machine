<?php

namespace GetWith\CoffeeMachine\Console\Shared\Domain\ValueObject;

final class DrinkTypeCost
{
	public function __construct(private float $cost){ }
	
	public function value(): float
	{
		return $this->cost;
	}
}
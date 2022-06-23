<?php

namespace GetWith\CoffeeMachine\Console\DrinkType\Domain\ValueObject;

final class DrinkTypeId
{
	public function __construct(private int $id){ }
	
	public function value(): int
	{
		return $this->id;
	}
}
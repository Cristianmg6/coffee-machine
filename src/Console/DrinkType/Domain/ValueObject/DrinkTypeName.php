<?php

namespace GetWith\CoffeeMachine\Console\DrinkType\Domain\ValueObject;

final class DrinkTypeName
{
	public function __construct(private string $name){ }
	
	public function value(): string
	{
		return $this->name;
	}
}
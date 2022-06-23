<?php

namespace GetWith\CoffeeMachine\Console\Order\Domain\ValueObject;

final class OrderExtraHot
{
	public function __construct(private bool $extraHot){ }
	
	public function value(): bool
	{
		return $this->extraHot;
	}
}
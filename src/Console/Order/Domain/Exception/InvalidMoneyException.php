<?php

namespace GetWith\CoffeeMachine\Console\Order\Domain\Exception;

use Exception;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\ValueObject\DrinkTypeCost;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\ValueObject\DrinkTypeName;

final class InvalidMoneyException extends Exception
{
	public function __construct(DrinkTypeName $name, DrinkTypeCost $cost)
	{
		parent::__construct(sprintf("The %s costs %s.", $name->value(), $cost->value()));
	}
}
<?php

namespace GetWith\CoffeeMachine\Console\Order\Domain\Exception;

use Exception;

final class InvalidSugarQuantityException extends Exception
{
	public function __construct($minQuantityRequired, $maxQuantityRequired)
	{
		parent::__construct(sprintf("The number of sugars should be between %s and %s.", $minQuantityRequired, $maxQuantityRequired));
	}
}
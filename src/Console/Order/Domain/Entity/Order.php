<?php

namespace GetWith\CoffeeMachine\Console\Order\Domain\Entity;

use GetWith\CoffeeMachine\Console\Shared\Domain\ValueObject\DrinkTypeCost;
use GetWith\CoffeeMachine\Console\Shared\Domain\ValueObject\DrinkTypeName;
use GetWith\CoffeeMachine\Console\Order\Domain\Exception\InvalidMoneyException;
use GetWith\CoffeeMachine\Console\Order\Domain\ValueObject\OrderExtraHot;
use GetWith\CoffeeMachine\Console\Order\Domain\ValueObject\OrderMoney;
use GetWith\CoffeeMachine\Console\Order\Domain\ValueObject\OrderSugars;

final class Order
{
	/** * @throws InvalidMoneyException */
	public function __construct(
		private DrinkTypeName $drinkTypeName,
		private DrinkTypeCost $drinkTypeCost,
		private OrderSugars $sugars,
		private OrderMoney $money,
		private OrderExtraHot $extraHot
	)
	{
		$this->validateMoneyWithDrinkTypeCost();
	}
	
	public function drinkTypeName() : DrinkTypeName
	{
		return $this->drinkTypeName;
	}
	
	public function drinkTypeCost() : DrinkTypeCost
	{
		return $this->drinkTypeCost;
	}
	
	public function sugars() : OrderSugars
	{
		return $this->sugars;
	}
	
	public function money() : OrderMoney
	{
		return $this->money;
	}
	
	public function extraHot() : OrderExtraHot
	{
		return $this->extraHot;
	}
	
	public function isExtraHot() : bool
	{
		return $this->extraHot->value();
	}
	
	/** * @throws InvalidMoneyException */
	private function validateMoneyWithDrinkTypeCost() : void
	{
		if($this->money->value() < $this->drinkTypeCost->value()){
			throw new InvalidMoneyException($this->drinkTypeName, $this->drinkTypeCost);
		}
	}
	
}
<?php

namespace GetWith\CoffeeMachine\Console\Order\Domain\Entity;

use Exception;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\Entity\DrinkType;
use GetWith\CoffeeMachine\Console\Order\Domain\Exception\InvalidMoneyException;
use GetWith\CoffeeMachine\Console\Order\Domain\ValueObject\OrderExtraHot;
use GetWith\CoffeeMachine\Console\Order\Domain\ValueObject\OrderMoney;
use GetWith\CoffeeMachine\Console\Order\Domain\ValueObject\OrderSugars;

final class Order
{
	/** * @throws Exception */
	public function __construct(
		private DrinkType $drinkType,
		private OrderSugars $sugars,
		private OrderMoney $money,
		private OrderExtraHot $extraHot
	){
		$this->validateMoneyWithDrinkTypeCost();
	}
	

	public function drinkType() : DrinkType
	{
		return $this->drinkType;
	}

	public function sugars() : OrderSugars
	{
		return $this->sugars;
	}
	
	public function money() : OrderMoney
	{
		return $this->money;
	}
	

	public function isExtraHot() : bool
	{
		return $this->extraHot->value();
	}
	
	
	/** * @throws InvalidMoneyException */
	private function validateMoneyWithDrinkTypeCost() : void
	{
		if($this->money->value() < $this->drinkType->cost()->value()){
			throw new InvalidMoneyException($this->drinkType->name(), $this->drinkType->cost());
		}
	}
	
}
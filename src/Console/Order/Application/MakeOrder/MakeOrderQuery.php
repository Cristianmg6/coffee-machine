<?php

namespace GetWith\CoffeeMachine\Console\Order\Application\MakeOrder;

final class MakeOrderQuery
{
	public function __construct(
		private string $drinkTypeName,
		private float $money,
		private int $sugars,
		private bool $extraHot
	){ }
	
	/**
	 * @return string
	 */
	public function drinkTypeName() : string
	{
		return $this->drinkTypeName;
	}
	
	/**
	 * @return float
	 */
	public function money() : float
	{
		return $this->money;
	}
	
	/**
	 * @return int
	 */
	public function sugars() : int
	{
		return $this->sugars;
	}
	
	/**
	 * @return bool
	 */
	public function extraHot() : bool
	{
		return $this->extraHot;
	}
	
}
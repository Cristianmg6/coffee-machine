<?php

namespace GetWith\CoffeeMachine\Console\DrinkType\Domain\Collection;

use GetWith\CoffeeMachine\Console\DrinkType\Domain\Entity\DrinkType;

final class DrinkTypeCollection
{
	private array $items;
	
	public function __construct()
	{
		$this->items = array();
	}
	
	public function add(DrinkType $item) : void
	{
		$this->items[] = $item;
	}
	
	public function getAll(): array
	{
		return $this->items;
	}
	
	public function getCount(): int
	{
		return count($this->items);
	}
}
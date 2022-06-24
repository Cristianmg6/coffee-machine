<?php

namespace GetWith\CoffeeMachine\Console\DrinkType\Application\GetByName;

use GetWith\CoffeeMachine\Console\DrinkType\Domain\Contract\DrinkTypeRepositoryInterface;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\Entity\DrinkType;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\Exception\DrinkTypeNotFoundException;
use GetWith\CoffeeMachine\Console\Shared\Domain\ValueObject\DrinkTypeName;

final class GetDrinkTypeByNameService
{
	public function __construct(
		private DrinkTypeRepositoryInterface $drinkTypeRepository
	){ }
	
	/** @throws DrinkTypeNotFoundException */
	public function handle(DrinkTypeName $name): DrinkType
	{
		return $this->drinkTypeRepository->getByName($name);
	}
}
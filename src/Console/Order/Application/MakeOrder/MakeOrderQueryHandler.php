<?php

namespace GetWith\CoffeeMachine\Console\Order\Application\MakeOrder;

use GetWith\CoffeeMachine\Console\DrinkType\Application\GetByName\GetDrinkTypeByNameService;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\Exception\DrinkTypeNotFoundException;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\ValueObject\DrinkTypeName;
use GetWith\CoffeeMachine\Console\DrinkType\Infrastructure\Repository\InMemoryDrinkTypeRepository;

final class MakeOrderQueryHandler
{
	
	private MakeOrderService          $makeOrderService;
	private GetDrinkTypeByNameService $getDrinkTypeByNameService;
	
	public function __construct()
	{
		$this->getDrinkTypeByNameService = new GetDrinkTypeByNameService(new InMemoryDrinkTypeRepository());
		$this->makeOrderService = new MakeOrderService();
	}
	
	public function __invoke(MakeOrderQuery $query): string
	{
		try{
			$drinkType = $this->getDrinkTypeByNameService->handle(new DrinkTypeName($query->drinkTypeName()));
			return $this->makeOrderService->__invoke($drinkType->name()->value(), $query->money(), $query->sugars(), $query->extraHot());
		}catch(DrinkTypeNotFoundException $e){
			return $e->getMessage();
		}
	}
	
}
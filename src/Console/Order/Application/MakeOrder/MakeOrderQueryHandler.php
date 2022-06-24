<?php

namespace GetWith\CoffeeMachine\Console\Order\Application\MakeOrder;

use GetWith\CoffeeMachine\Console\DrinkType\Application\GetByName\GetDrinkTypeByNameService;
use GetWith\CoffeeMachine\Console\Shared\Domain\ValueObject\DrinkTypeName;
use GetWith\CoffeeMachine\Console\DrinkType\Infrastructure\Repository\InMemoryDrinkTypeRepository;
use GetWith\CoffeeMachine\Console\Order\Domain\ValueObject\OrderExtraHot;
use GetWith\CoffeeMachine\Console\Order\Domain\ValueObject\OrderMoney;
use GetWith\CoffeeMachine\Console\Order\Domain\ValueObject\OrderSugars;
use Throwable;

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
			return $this->makeOrderService->__invoke(
				$drinkType->name(),
				$drinkType->cost(),
				new OrderMoney($query->money()),
				new OrderSugars($query->sugars()),
				new OrderExtraHot($query->extraHot())
			);
		}catch(Throwable $e){
			return $e->getMessage();
		}
	}
	
}
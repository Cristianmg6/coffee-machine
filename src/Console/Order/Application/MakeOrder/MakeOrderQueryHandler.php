<?php

namespace GetWith\CoffeeMachine\Console\Order\Application\MakeOrder;

final class MakeOrderQueryHandler
{
	
	private MakeOrderService          $makeOrderService;
	
	public function __construct()
	{
		$this->makeOrderService = new MakeOrderService();
	}
	
	public function __invoke(MakeOrderQuery $query): string
	{
		return $this->makeOrderService->__invoke($query->drinkTypeName(), $query->money(), $query->sugars(), $query->extraHot());
	}
	
}
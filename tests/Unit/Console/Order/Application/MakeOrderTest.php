<?php

namespace GetWith\CoffeeMachine\Tests\Unit\Console\Order\Application;

use GetWith\CoffeeMachine\Console\Order\Application\MakeOrder\MakeOrderQuery;
use GetWith\CoffeeMachine\Console\Order\Application\MakeOrder\MakeOrderQueryHandler;
use GetWith\CoffeeMachine\Console\Order\Application\MakeOrder\MakeOrderService;
use GetWith\CoffeeMachine\Console\Order\Application\MakeOrder\OrderResponse;
use GetWith\CoffeeMachine\Console\Order\Domain\Exception\InvalidMoneyException;
use GetWith\CoffeeMachine\Console\Order\Domain\Exception\InvalidSugarQuantityException;
use GetWith\CoffeeMachine\Console\Order\Domain\ValueObject\OrderSugars;
use GetWith\CoffeeMachine\Tests\Unit\Console\DrinkType\Domain\Entity\DrinkTypeMother;
use GetWith\CoffeeMachine\Tests\Unit\Console\Order\Domain\Entity\OrderMother;
use GetWith\CoffeeMachine\Tests\Unit\Console\Order\Domain\ValueObject\OrderExtraHotMother;
use GetWith\CoffeeMachine\Tests\Unit\Console\Order\Domain\ValueObject\OrderSugarsMother;
use GetWith\CoffeeMachine\Tests\Unit\Console\Order\OrderModuleUnitTestCase;

class MakeOrderTest extends OrderModuleUnitTestCase
{
	private MakeOrderService $service;
	
	protected function setUp() : void
	{
		parent::setUp();
	}
	
	/** @test */
	public function make_order_command(): void
	{
		
		$drinkType = DrinkTypeMother::randomWithCost(0.5);
		$order = OrderMother::randomCorrectWithDrinkType($drinkType);
		$this->assertIsFloat($order->drinkTypeCost()->value());
		$orderResponse = new OrderResponse($order);
		
		$this->shouldGetDrinkTypeByName($drinkType);
		$makeOrderQuery = new MakeOrderQuery($order->drinkTypeName()->value(), $order->money()->value(), $order->sugars()->value(), $order->extraHot()->value());
		$makeOrderHandler = new MakeOrderQueryHandler($this->drinkTypeRepository());
		$result = $makeOrderHandler($makeOrderQuery);
		$this->assertEquals($orderResponse->toString(), $result);
	}
	
	/** @test */
	public function make_invalid_money_order_command(): void
	{
		
		$drinkType = DrinkTypeMother::randomWithCost(0.5);
		
		$this->shouldGetDrinkTypeByName($drinkType);
		$makeOrderQuery = new MakeOrderQuery($drinkType->name()->value(), ($drinkType->cost()->value() - 0.1), OrderSugarsMother::randomInRange()->value(), OrderExtraHotMother::random()->value());
		$makeOrderHandler = new MakeOrderQueryHandler($this->drinkTypeRepository());
		$result = $makeOrderHandler($makeOrderQuery);
		
		$expected = new InvalidMoneyException($drinkType->name(), $drinkType->cost());
		$this->assertEquals($expected->getMessage(), $result);
	}
	
	/** @test */
	public function make_invalid_sugars_order_command(): void
	{
		
		$drinkType = DrinkTypeMother::randomWithCost(0.5);
		
		$this->shouldGetDrinkTypeByName($drinkType);
		$makeOrderQuery = new MakeOrderQuery($drinkType->name()->value(), ($drinkType->cost()->value() + 0.1), OrderSugars::MAX_QUANTITY_REQUIRED + 1, OrderExtraHotMother::random()->value());
		$makeOrderHandler = new MakeOrderQueryHandler($this->drinkTypeRepository());
		$result = $makeOrderHandler($makeOrderQuery);
		
		$expected = new InvalidSugarQuantityException(OrderSugars::MIN_QUANTITY_REQUIRED, OrderSugars::MAX_QUANTITY_REQUIRED);
		$this->assertEquals($expected->getMessage(), $result);
	}
}
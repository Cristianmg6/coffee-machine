<?php

namespace GetWith\CoffeeMachine\Tests\Unit\Console\Order;

use GetWith\CoffeeMachine\Console\DrinkType\Domain\Contract\DrinkTypeRepositoryInterface;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\Entity\DrinkType;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class OrderModuleUnitTestCase extends TestCase
{
	
	private DrinkTypeRepositoryInterface $drinkTypeRepository;
	
	protected function setUp() : void
	{
		$this->drinkTypeRepository = Mockery::mock(DrinkTypeRepositoryInterface::class);
	}
	
	protected function drinkTypeRepository() : DrinkTypeRepositoryInterface|MockInterface
	{
		return $this->drinkTypeRepository;
	}
	
	
	protected function shouldGetDrinkTypeByName(DrinkType $drinkType): void
	{
		$this->drinkTypeRepository()
			->shouldReceive('getByName')
			->withArgs(
				function($drinkTypeName) use ($drinkType){
					$this->assertEquals($drinkType->name(), $drinkTypeName);
					return true;
				}
			)
			->andReturn($drinkType);
	}
}
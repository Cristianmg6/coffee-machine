<?php

namespace GetWith\CoffeeMachine\Tests\Unit\Console\DrinkType;

use GetWith\CoffeeMachine\Console\DrinkType\Domain\Contract\DrinkTypeRepositoryInterface;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\Entity\DrinkType;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\Exception\DrinkTypeNotFoundException;
use GetWith\CoffeeMachine\Console\Shared\Domain\ValueObject\DrinkTypeName;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class DrinkTypeModuleUnitTestCase extends TestCase
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
	
	
	
	protected function shouldNotFoundDrinkTypeByName(DrinkTypeName $drinkTypeName)
	{
		$this->drinkTypeRepository()
			->shouldReceive('getByName')
			->withArgs(
				function($name) use ($drinkTypeName){
					$this->assertEquals($drinkTypeName, $name);
					return true;
				}
			)
			->andThrow(DrinkTypeNotFoundException::class);
	}
	
}
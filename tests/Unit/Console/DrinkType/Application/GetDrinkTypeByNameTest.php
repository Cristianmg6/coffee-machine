<?php

namespace GetWith\CoffeeMachine\Tests\Unit\Console\DrinkType\Application;

use GetWith\CoffeeMachine\Console\DrinkType\Application\GetByName\GetDrinkTypeByNameService;
use GetWith\CoffeeMachine\Console\DrinkType\Domain\Exception\DrinkTypeNotFoundException;
use GetWith\CoffeeMachine\Tests\Unit\Console\DrinkType\Domain\Entity\DrinkTypeMother;
use GetWith\CoffeeMachine\Tests\Unit\Console\DrinkType\DrinkTypeModuleUnitTestCase;
use GetWith\CoffeeMachine\Tests\Unit\Console\Shared\Domain\ValueObject\DrinkTypeNameMother;

class GetDrinkTypeByNameTest extends DrinkTypeModuleUnitTestCase
{
	private GetDrinkTypeByNameService $service;
	
	public function setUp() : void
	{
		parent::setUp();
		$this->service = new GetDrinkTypeByNameService($this->drinkTypeRepository());
	}
	
	/** @test */
	public function get_drink_type(): void
	{
		$drinkType = DrinkTypeMother::random();
		$this->shouldGetDrinkTypeByName($drinkType);
		$result = $this->service->handle($drinkType->name());
		$this->assertEquals($drinkType->id()->value(), $result->id()->value());
		$this->assertEquals($drinkType->name()->value(), $result->name()->value());
		$this->assertEquals($drinkType->cost()->value(), $result->cost()->value());
	}
	
	/** @test */
	public function drink_type_not_found(): void
	{
		$this->expectException(DrinkTypeNotFoundException::class);
		
		$drinkTypeName = DrinkTypeNameMother::random();
		$this->shouldNotFoundDrinkTypeByName($drinkTypeName);
		$this->service->handle($drinkTypeName);
	}
	
	
}
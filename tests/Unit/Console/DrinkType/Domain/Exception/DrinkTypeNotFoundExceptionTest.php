<?php

namespace GetWith\CoffeeMachine\Tests\Unit\Console\DrinkType\Domain\Exception;

use GetWith\CoffeeMachine\Console\DrinkType\Domain\Exception\DrinkTypeNotFoundException;
use GetWith\CoffeeMachine\Tests\Unit\Console\DrinkType\Domain\Entity\DrinkTypeMother;
use GetWith\CoffeeMachine\Tests\Unit\Console\DrinkType\DrinkTypeModuleUnitTestCase;

class DrinkTypeNotFoundExceptionTest extends DrinkTypeModuleUnitTestCase
{
	protected function setUp() : void
	{
		parent::setUp();
	}
	
	/** @test */
	public function of_not_found_with_available_types_exception(): void
	{
		$drinkTypes = DrinkTypeMother::collectionOf(3);
		$exception = DrinkTypeNotFoundException::ofDrinkTypeNameNotFoundWithAvailableTypes($drinkTypes);
		$this->assertEquals($exception::class, DrinkTypeNotFoundException::class);
	}
}
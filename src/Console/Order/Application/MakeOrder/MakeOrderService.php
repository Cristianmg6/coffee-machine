<?php

namespace GetWith\CoffeeMachine\Console\Order\Application\MakeOrder;

use Exception;
use Throwable;

final class MakeOrderService
{
	public function __construct(){ }
	
	public function __invoke(string $drinkType, float $money, int $sugars, bool $extraHot): string
	{
		try{
			$this->validateDrinkType($drinkType);
			$this->validateMoneyWithDrinkTypeCost($drinkType, $money);
			$this->validateSugarQuantity($sugars);
			return $this->getOrderResponse($drinkType, $extraHot, $sugars);
		}catch(Throwable $e){
			return $e->getMessage();
		}
	}
	
	/** * @throws Exception */
	private function validateDrinkType(string $drinkType) : void
	{
		if(!in_array($drinkType, ['tea', 'coffee', 'chocolate'])){
			throw new Exception('The drink type should be tea, coffee or chocolate.');
		}
	}
	
	/** * @throws Exception */
	private function validateMoneyWithDrinkTypeCost(string $drinkType, float $money) : void
	{
		switch($drinkType){
			case 'tea':
				if($money < 0.4){
					throw new Exception('The tea costs 0.4.');
				}
				break;
			case 'coffee':
				if($money < 0.5){
					throw new Exception('The coffee costs 0.5.');
				}
				break;
			case 'chocolate':
				if($money < 0.6){
					throw new Exception('The chocolate costs 0.6.');
				}
				break;
		}
	}
	
	/** * @throws Exception */
	protected function validateSugarQuantity(int $sugars) : void
	{
		if(!($sugars >= 0 && $sugars <= 2)){
			throw new Exception('The number of sugars should be between 0 and 2.');
		}
	}
	
	protected function getOrderResponse(string $drinkType, bool $extraHot, int $sugars) : string
	{
		$response = 'You have ordered a '.$drinkType;
		if($extraHot){
			$response .= ' extra hot';
		}
		if($sugars > 0){
			$response .= ' with '.$sugars.' sugars (stick included)';
		}
		return $response;
	}
}
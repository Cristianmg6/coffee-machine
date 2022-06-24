<?php

namespace GetWith\CoffeeMachine\Console\Order\Application\MakeOrder;

use Exception;
use GetWith\CoffeeMachine\Console\Shared\Domain\ValueObject\DrinkTypeCost;
use GetWith\CoffeeMachine\Console\Shared\Domain\ValueObject\DrinkTypeName;
use GetWith\CoffeeMachine\Console\Order\Domain\Entity\Order;
use GetWith\CoffeeMachine\Console\Order\Domain\ValueObject\OrderExtraHot;
use GetWith\CoffeeMachine\Console\Order\Domain\ValueObject\OrderMoney;
use GetWith\CoffeeMachine\Console\Order\Domain\ValueObject\OrderSugars;

final class MakeOrderService
{
	public function __construct(){ }
	
	/** * @throws Exception */
	public function __invoke(DrinkTypeName $drinkTypeName, DrinkTypeCost $drinkTypeCost, OrderMoney $money, OrderSugars $sugars, OrderExtraHot $extraHot): string
	{
		$order = new Order($drinkTypeName, $drinkTypeCost, $sugars, $money, $extraHot);
		return $this->getOrderResponse($order);
	}
	
	protected function getOrderResponse(Order $order) : string
	{
		$response = 'You have ordered a '.$order->drinkTypeName()->value();
		if($order->isExtraHot()){
			$response .= ' extra hot';
		}
		if($order->sugars()->value() > 0){
			$response .= ' with ' . $order->sugars()->value() . ' sugars (stick included)';
		}
		return $response;
	}
}
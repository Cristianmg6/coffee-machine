<?php

namespace GetWith\CoffeeMachine\Console\Order\Application\MakeOrder;

use GetWith\CoffeeMachine\Console\Order\Domain\Entity\Order;

final class OrderResponse
{
	public function __construct(private Order $order){ }
	
	public function toString() : string
	{
		$response = 'You have ordered a '.$this->order->drinkTypeName()->value();
		if($this->order->isExtraHot()){
			$response .= ' extra hot';
		}
		if($this->order->sugars()->value() > 0){
			$response .= ' with ' . $this->order->sugars()->value() . ' sugars (stick included)';
		}
		return $response;
	}
}
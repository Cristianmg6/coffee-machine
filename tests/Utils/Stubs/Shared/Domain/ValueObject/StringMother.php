<?php

namespace GetWith\CoffeeMachine\Tests\Utils\Stubs\Shared\Domain\ValueObject;

final class StringMother
{
    public static function random(): string
    {
        return MotherCreator::random()->word;
    }
}

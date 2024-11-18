<?php

declare(strict_types = 1);

namespace Animals;

class Dog implements IAnimal
{
    public function makeSound(): void
    {
        echo "Гав-гав" . PHP_EOL;
    }
    public function eat(): void
    {
        echo "Ест корм для собак" . PHP_EOL;
    }
    public function sleep(): void
    {
        echo "Спит в будке" . PHP_EOL;
    }
}

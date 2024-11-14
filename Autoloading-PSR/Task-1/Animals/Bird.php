<?php

declare(strict_types = 1);

namespace Animals;
class Bird implements IAnimal
{
    public function makeSound(): void
    {
        echo "Чик-чирик" . PHP_EOL;
    }
    public function eat(): void
    {
        echo "Ест корм для птиц" . PHP_EOL;
    }
    public function sleep(): void
    {
        echo "Cпит в гнезде" . PHP_EOL;
    }
}

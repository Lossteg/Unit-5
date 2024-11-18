<?php

declare(strict_types = 1);

namespace Animals;

class Cat implements IAnimal
{
    public function makeSound(): void
    {
        echo "Мяу-мяу" . PHP_EOL;
    }
    public function eat(): void
    {
        echo "Ест корм для котов" . PHP_EOL;
    }
    public function sleep(): void
    {
        echo "Cпит в коробке" . PHP_EOL;
    }
}

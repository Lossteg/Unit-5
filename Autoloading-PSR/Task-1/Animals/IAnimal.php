<?php

declare(strict_types = 1);

namespace Animals;
interface IAnimal
{
    public function makeSound(): void;
    public function eat(): void;
    public function sleep(): void;
}

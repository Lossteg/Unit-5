<?php

declare(strict_types = 1);

use Animals\Bird;
use Animals\Cat;
use Animals\Dog;

require __DIR__ . '/autoload.php';

$dog = new Dog();
echo PHP_EOL . 'Cобака:' . PHP_EOL;
$dog->makeSound();
$dog->eat();
$dog->sleep();

$bird = new Bird();
echo PHP_EOL . 'Птица:' . PHP_EOL;
$bird->makeSound();
$bird->eat();
$bird->sleep();

$cat = new Cat();
echo PHP_EOL . 'Кошка:' . PHP_EOL;
$cat->makeSound();
$cat->eat();
$cat->sleep();
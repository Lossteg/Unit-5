<?php

declare(strict_types=1);

//region Task 1
$users = [
    'John' => 29,
    'Sally' => 56,
    'Molly' => 6,
    'Chester' => 16,
    'Sam' => 18
];

echo 'Task 1'. PHP_EOL . 'Initial array'. PHP_EOL;
print_r($users);
echo PHP_EOL;

$users = array_filter($users, function ($age) {
    return ($age >= 18);
});

echo 'Filtered array' . PHP_EOL;
print_r($users);
echo PHP_EOL;
// endregion

//region Task 2
$numbers = [2, 5, 19, 56, 72, 0];

echo 'Task2'. PHP_EOL . 'Initial array'. PHP_EOL;
print_r($numbers);
echo PHP_EOL;

sort($numbers);

echo 'Sorted array' . PHP_EOL;
print_r($numbers);
echo PHP_EOL;
//endregion

//region Task 3
$strings = [
    'Hello',
    'End',
    'Bob',
    'Once'
];

echo 'Task3'. PHP_EOL . 'Initial array'. PHP_EOL;
print_r($strings);
echo PHP_EOL;

$searchText = 'Bob';
if(in_array($searchText, $strings)) {
    echo "Needle $searchText was found";
} else {
    echo "Needle $searchText was not found";
}
//endregion

//region Task 4
$fruits = [
    7 => 'apple',
    3 => 'pineapple',
    'eat' => 'banana'
];

$vegetables = [
    'cucumber',
    'potato',
    'pepper'
];

echo 'Task4'. PHP_EOL . 'Initial arrays:'. PHP_EOL;
print_r($fruits);
echo PHP_EOL;
print_r($vegetables);
echo PHP_EOL;

$mergedArray = array_merge($fruits, $vegetables);

echo 'Merged array' . PHP_EOL;
print_r($mergedArray);
echo PHP_EOL;
//endregion

//region Task 5
$someElements = [
    1 => 'Yo mama',
    'Yo dada' => 2,
    13 => 'something'
];

echo 'Task 5'. PHP_EOL . 'Initial array:'. PHP_EOL;
print_r($someElements);
echo PHP_EOL;

unset($someElements[13]);

echo 'Array with 1 deleted element' . PHP_EOL;
print_r($someElements);
echo PHP_EOL;

unset($someElements['Yo dada']);

echo 'Array with 2 deleted elements' . PHP_EOL;
print_r($someElements);
echo PHP_EOL;
//endregion

//region Task 6
$associativeArray = [
    'first' => 1,
    'second' => 2,
    'third' => 3,
    4 => 'four'
];

echo 'Task 6'. PHP_EOL . 'Initial array:'. PHP_EOL;
print_r($associativeArray);
echo PHP_EOL;

$flipped = array_flip($associativeArray);

echo 'Flipped array' . PHP_EOL;
print_r($flipped);
echo PHP_EOL;
//endregion

//region Task 7
$students = [
    [
        'name' => 'John',
        'age' => 20,
        'grades' => [85, 90, 92]
    ],
    [
        'name' => 'Mary',
        'age' => 22,
        'grades' => [88, 95, 91]
    ],
    [
        'name' => 'Peter',
        'age' => 21,
        'grades' => [75, 80, 85]
    ]
];

foreach ($students as $student) {
    echo "Name: {$student['name']}\n";
    echo "Age: {$student['age']}\n";

    echo "Grades: ";
    foreach ($student['grades'] as $grade) {
        echo "$grade ";
    }
    echo PHP_EOL;
}
//endregion

//region Task 8
$arrayOfStrings = [
   'lol' => 'Some',
    2 => 'Words',
    'cringe' => 'Useless'
];

echo 'Task 8'. PHP_EOL . 'Initial array:'. PHP_EOL;
print_r($arrayOfStrings);
echo PHP_EOL;

$modifiedArrayOfStrings = array_map(function($word){
    return strtoupper($word);
}, $arrayOfStrings);

echo 'Modified array:'. PHP_EOL;
print_r($modifiedArrayOfStrings);
echo PHP_EOL;
//endregion

//region Task 9
$sales = [
    ['product' => 'laptop', 'price' => 1000, 'quantity' => 5],
    ['product' => 'phone', 'price' => 500, 'quantity' => 3],
    ['product' => 'tablet', 'price' => 300, 'quantity' => 4],
    ['product' => 'laptop', 'price' => 1200, 'quantity' => 2]
];

echo 'Task 9'. PHP_EOL . 'Initial array:'. PHP_EOL;
print_r($sales);
echo PHP_EOL;

$totalRevenue = array_reduce($sales, function($carry, $item) {
    return $carry + ($item['price'] * $item['quantity']);
});

echo "Total revenue: $totalRevenue". PHP_EOL;
//endregion

//region Task 10
function bubble_sort(&$array)
{
    for ($i=0; $i < count($array); $i++)
    {
        for ($y=($i+1); $y < count($array); $y++)
        {
            if ($array[$i] > $array[$y])
            {
                $c = $array[$i];
                $array[$i] = $array[$y];
                $array[$y] = $c;
            }
        }
    }
}

$arr = [92, 64, 87, 18, 17, 66, 80];

echo 'Task 10'. PHP_EOL . 'Initial array:'. PHP_EOL;
print_r($arr);
echo PHP_EOL;

bubble_sort($arr);

echo 'Bubble-sorted array:'. PHP_EOL;
print_r($arr);
echo PHP_EOL;
//endregion

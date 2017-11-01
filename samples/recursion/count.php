<?php

// with parents: 13 elements
// without parents: 9 elements
$data = [
    'personal' => [
        'name' => 'Dmytro',
        'age' => 28,
        'contacts' => [
            'email' => 'd.kotenko@i.ua',
            'phone' => '+380501675361',
            'address' => [
                'city' => 'Kiev',
                'company' => 'PHP Academy'
            ]
        ]
    ],
    'description' => 'Some text about me',
    'experience' => [
        'PHP' => '5+',
        'JS' => '5+'
    ]
];

function countRecursive(array $array, $withParents = true)
{
    $quantity = 0;
    foreach ($array as $row) {
        if (is_array($row)) {
            if ($withParents) {
                $quantity++;
            }
            $quantity += countRecursive($row, $withParents);
        } else {
            $quantity++;
        }
    }

    return $quantity;
}

echo 'Elements quantity: ', countRecursive($data, false);

print_r($data);

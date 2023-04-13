<?php
$number=98;

if ($number % 3 == 0 && $number % 5 == 0) {
    echo "Foo & Bar";
} else if ($number % 3 == 0) {
    echo "Foo";
} else if ($number % 5 == 0) {
    echo "Bar";
} else {
    echo "Neither Foo nor Bar";
}

$first_number=800;
$second_number=1000;

$condition=false;

echo ($condition) ? $first_number + $second_number : $first_number - $second_number;



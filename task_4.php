<?php
for ($i = 0; $i < 15; $i++) {
if ($i === 10) {
break;
}
echo "The number is: $i\n";
}
?>


<?php
for ($i = 0; $i <= 20; $i++) {
if($i % 2 == 0) {
continue;
}
echo "$i\n";
}
?>



<?php
$cities = array ("Banglore", "Mysore", "Hampi", "Hassan", "Ballari", "kalburgi", "Belur", "Tumakuru", "Mandya", "Kolar");


array_push($cities, "Hosur");
var_dump ($cities);

array_unshift($cities, "Salem");
var_dump ($cities);

$sliced_array = array_slice($cities, 0, 5, true);
var_dump ($sliced_array);

rsort($cities);
var_dump($cities);

$filtered_cities = array_filter($cities, function ($city) {
return strlen($city) < 5;    
});
$filtered_cities_count = count($filtered_cities);
echo "Cities less than 5 characters name: " . implode(", ", $filtered_cities) . "\n";
echo "Length of anarray: " . $filtered_cities_count;

?>



<?php
$numbers = array(
  array(1, 1),
  array(2, 2),
  array(3, 3),
  array(4, 4),
  array(5, 5),
  array(6, 6),
  array(7, 7),
  array(8, 8),
  array(9, 9),
  array(10, 10)
);
unset($numbers[5], $numbers[6], $numbers[7]);
var_dump ($numbers);
?>

















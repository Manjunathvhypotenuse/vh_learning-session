<?php

for ($value=1; $value <=10; $value++){
    echo " loop has been executed is $value\n";
}

?>




<?php
$number1=10;
$number2=20;
$sum = $number1 + $number2;


while ($sum <= 50) {
    $number1++;
    $number2 +2;
    $sum = $number1 + $number2;
}

echo "$sum";
?>


<?php
$asociative_array= array ("label" => "box", "dimension" => "22*33*22");

foreach ($asociative_array as $display => $val){
    echo "$display = $val\n";
}
?>




<?php
$numbers= array ("11", "22", "33", "44");
$index=0;

foreach ($numbers as $display => $val){
    echo "$display = $val \n";
    $index++;

}
?>



<?php
function divide($num1 ,$num2){
    if(is_int($num1) && is_int($num2)){
        $quationent = $num1 / $num2;
        echo "the return value :". $quationent;
    }
    else{
            echo "Provided numbers are not valid";
    }
    }
    divide(10,"10");

    ?>

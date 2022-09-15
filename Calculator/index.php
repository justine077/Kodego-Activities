<?php
require_once 'Calculator.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>




    <?php 
    $number1 = 5;
    $number2 = 4;
    $operator = '+';

    $calculator = new Calculator();
    $calculator->setNumbers($number1, $number2);
    $calculator->setOperator($operator);
    $calculator->calculate();

    echo $number1." ".$operator." ".$number2." = ".$calculator->getOutput();

    
    ?>

</body>
</html>
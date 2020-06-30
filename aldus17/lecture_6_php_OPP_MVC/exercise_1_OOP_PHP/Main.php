<?php

include_once("Car.php");

$mazda = new Car("Mazda", 3);
$ford = new Car("Ford", 2);
$hyndai = new Car("Hyndai", 3);


echo $mazda->getLength() . "<br>";
echo $ford->getLength() . "<br>";
echo $hyndai->getLength() . "<br>";

echo $mazda->__toString() . "<br>";
echo $ford->__toString() . "<br>";
echo $hyndai->__toString() . "<br>";

echo Car::compareObjects($mazda, $ford) . "<br>";
echo Car::compareObjects($ford, $mazda) . "<br>";
echo Car::compareObjects($hyndai, $mazda) . "<br>";

$mazda->setLength(4);
$ford->setLength(6);
$hyndai->setLength(12);

echo $mazda->getLength() . "<br>";
echo $ford->getLength() . "<br>";
echo $hyndai->getLength() . "<br>";

echo $mazda->__toString() . "<br>";
echo $ford->__toString() . "<br>";
echo $hyndai->getLength() . "<br>";

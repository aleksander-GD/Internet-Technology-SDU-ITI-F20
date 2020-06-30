<?php

include_once("ICar.php");

class Car implements ICar
{
    private $length;
    private $name;
    public function __construct($name, $len)
    {
        $this->name = $name;
        $this->length = $len;
    }
    public function getLength()
    {
        return $this->length;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setLength($length)
    {
        $this->length = $length;
    }
    public static function compareObjects($object1, $object2)
    {
        return self::bool2str(
            $object1->getLength() == $object2->getLength(),
            $object1,
            $object2
        ) . "<br>";
    }
    public static function bool2str($bool, $obj1, $obj2)
    {
        if (!$bool) {
            return $obj1->getName() .
                '(' . $obj1->getLength() . ')' .
                ' is not the same length as ' .
                $obj2->getName() .
                '(' . $obj2->getLength() . ')';
        } else {
            return $obj1->getName() .
                '(' . $obj1->getLength() . ')' .
                ' is the same length as ' .
                $obj2->getName() .
                '(' . $obj2->getLength() . ')';
        }
    }
    public function __toString()
    {
        return "The cars name is: " . $this->name . " and it is " . $this->length . " in length" . "<br>";
    }
}
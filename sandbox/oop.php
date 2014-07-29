<?php

class MyClass
{
    public $prop1 = "strer";

    public function __construct()
    {
    	echo "create object, class - ".__CLASS__."</br>";
    }

    public function __destruct()
    {
    	echo "object class ".__CLASS__." delete </br>";
    }

    public function __toString()
    {
    	echo "to string </br>";
    	return $this->getProperty();
    }

    public function setProperty($newval)
    {
    	$this->prop1 = "$newval";

    }
    public function getProperty()
    {
    	return $this->prop1."</br>";
    }

    public static $count = 0;

		public static function plusOne()
		{
					return "count = " . ++self::$count . ".<br />";
		}

}

$obj = new MyClass;
$obj2 = new MyClass;

//echo $obj->prop1;

echo $obj->getProperty();
echo $obj2->getProperty();

$obj->setProperty("asdfg");
$obj2->setProperty("zxcb");

echo $obj->getProperty();			
echo $obj2->getProperty();
echo "your string - ".$obj;
//unset($obj2);					// удаление(ТОЛЬКО ПОСЛЕ ОЪЕКТА КОТ УДАЛ)

$temp = new MyClass("prop1");
print_r($temp); echo '</br>';

//var_dump($obj);

class MyOtherClass extends MyClass
{
	/* public function __construct()
    {
        parent::__construct(); // Вызываем конструктор родительского класса
        echo "Новый конструктор в классе " . __CLASS__ . ".<br />";
    }*/

    public function newMethod()
    {
        echo "Method " . __CLASS__ . ".<br />";
    }
}
 
$newobj = new MyOtherClass;

echo $newobj->newMethod();

echo $newobj->getProperty();

do 
{ 
	// Вызываем plusOne без инициации класса MyClass
	echo MyClass::plusOne();
} while ( MyClass::$count < 10);


echo '&laquo';  // знак <<
?>
<?php
abstract class CAnimal
{
	/**
	 * properties
	 */
	public $abilities = array();
	
	/**
	 * get and set
	 */
	public function __set($name, $value)
	{
		$this->abilities[$name] = $value;
	}
	
	public function __get($name)
	{
		return isset($this->abilities[$name]) ? $this->abilities[$name] : null;
	}
	
	/**
	 * methods
	 */
	public function Eat()
	{
		echo "I'm eating<br/>";
	}
	
	public function __call($method, $arguments)
	{
		echo "Calling object method '$method' "
			. implode(', ', $arguments). "<br/>";
	}
	
	abstract public function Noice();
}

class CMouse extends CAnimal
{
	public function Noice()
	{
		echo "Piip piip<br/>";
	}
	
}

class CCat extends CAnimal
{
	public function Noice()
	{
		echo "Mjau, mjaaaau<br/>";
	}
}

//Use the classes
$cat = new CCat;
$mouse = new CMouse;

$mouse->Eat();
$mouse->Noice();

$cat->Eat();
$cat->Noice();

$mouse->speed = 'fast';
$mouse->size = 'small';
$mouse->weight = 0.5;

$mouse->Jump('high', 'width head first');
$mouse->Swim('fast');

echo "<pre>";
var_dump($mouse->abilities);
echo "</pre>";


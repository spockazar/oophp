<?php

class SimpleClass
{
	public $var = "A default value: ";
	public $val = 0;
	
	public function DisplayVar()
	{
		$this->val++;
		echo $this->var . $this->val;
	}
}
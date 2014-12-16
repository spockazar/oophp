<?php
/**
 * Class to play with a dice
 */
class CDice
{
	/**
	 * Properties
	 */
	protected $rolls = array();
	private $faces;
	private $last;
	
	
	/**
	 * Constructor
	 *
	 * @param int $faces the number of faces of the dice
	 */
	 public function __construct($faces=6)
	 {
		 $this->faces = $faces;
	 }
	 
	 
	 /**
	  * Destructor
	  *
	  */
	  public function __destruct()
	  {
		  //echo __METHOD__;
	  }
	  
	  
	/**
	 * Get methods for properties
	 */
	public function GetFaces()
	{
		return $this->faces;
	}
	
	public function GetRollsArray()
	{
		return $this->rolls;
	}
	
	public function GetLastRoll()
	{
		return $this->last;
	}
	 
	
	/**
	 * Method to Roll the dice
	 */
	public function Roll($times)
	{
		$this->rolls = array();
		
		for($i = 0; $i < $times; $i++)
		{
			$this->last = rand(1, $this->faces);
			$this->rolls[] = $this->last;
		}
		return $this->last;
	}
	
	/**
	 * Method to discplay the total score of each roll
	 */
	public function GetTotal()
	{
		return array_sum($this->rolls);
	}
	
	/**
	 * Method to display the average score
	 */
	public function GetAverage()
	{
		return round(array_sum($this->rolls) / count($this->rolls), 1);
	}
	
	
	/**
	 * Get the rolls as a string with each roll separated by a comma
	 *
	 */
	public function GetRollsAsSerie()
	{
		$html = null;
		foreach($this->rolls as $val)
		{
			$html .= "{$val}, ";
		}
		return substr($html, 0, strlen($html) -2);
	}
	
	
	/**
	 * Method to show the result of the rolls
	 */
	public function PrintResult($rolls)
	{
		$html = "<ul>";
		foreach($rolls as $val)
		{
			$html .= "<li>{$val}</li>";
		}
		$html .= "</ul>";
		echo $html;
	}
}
<?php
/**
 * Vlass for preparing and showing histograms
 *
 */
class CHistogram
{
	/**
	 * Properties
	 *
	 */
	 
	 /**
	  * Constructor
	  *
	  */
	  public function __construct()
	  {
		  echo __METHOD__;
	  }
	  
	  
	  /**
	   * Desctructor 
	   *
	   */
	   public function __destructor()
	   {
		   echo __METHOD__;
	   }
	   
	/**
	 * Preparethe histogram to calculate occurances of each key
	 *
	 * @param array $valuesthe values to prepare out the histogram
	 */
	private function PrepareHistogram($values)
	{
		$this->res = array();
		foreach($values as $key => $value)
		{
			@$this->res[$value] .= '*';
		}
		ksort($this->res);
		
	}
	 
	 
	/**
	 * Print the historgram
	 *
	 * @param array $array, the array from which to print the historgram from
	 */
	public function GetHistorgram($values)
	{
		$this->PrepareHistogram($values);
		
		//Print out the historgram
		$html = "<ul>";
		foreach($this->res as $key => $val)
		{
			$html .= "<li>{$val} ($key)</li>";
		}
		$html .= "</ul>";
		return $html;
	}
	
	
	/**
	 * Print the histogram and include the empty ones
	 *
	 * @param array $array the array to print out the hitogram from
	 * @param int $max number of staples in the histogram
	 * @return string as the historgram in a ul lu list
	 */
	 public function GetHistogramIncludeEmpty($values, $max)
	 {
		 $this->PrepareHistogram($values);
		 
		 //Print out the result
		 $html = "<ol>";
		 for($i = 1; $i <= $max; $i++)
		 {
			 $val = isset($this->res[$i]) ? $this->res[$i] : null;
			 $html .= "<li>{$val}</li>";
		 }
		 $html .= "</ol>";
		 
		 return $html;
	 }
}
		
		
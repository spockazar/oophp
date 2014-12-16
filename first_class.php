<?php
/**
 * Class to play with a dice
 */
class CDice
{
	/**
	 * Properties
	 */
	public $rolls = array();
	
	/**
	 * Method to Roll the dice
	 */
	public function Roll($times)
	{
		$this->rolls = array();
		
		for($i = 0; $i < $times; $i++)
		{
			$this->rolls[] = rand(1, 6);
		}
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
?><!doctype html>
<html lang="sv">
<meta charset="utf-8">
<title>Min första klass</title>
<h1>En tärning</h1>

<p>Välj hur många gånger du vill kasta tänringen: <a href="?roll=6">6 kast</a>, <a href="?roll=12">12 kast</a>, eller <a href="?roll=24">24 kast</a>?</p>

<?php
$dice = new CDice(); // Create an insteace of the CDice class

$times = isset($_GET['roll']) && is_numeric($_GET['roll']) ? $_GET['roll'] : 6; // Set $times according to the roll page part
$dice->Roll($times); // Roll the dice with the Roll method
$rolls = $dice->rolls; // Assign the number of rolls to the variable $rolls

$dice->PrintResult($rolls); // Print out the result of the rolls with the PrintResult method
?>

<!-- Print result of the other CDice class methods -->
<p>Du gjorde <?=count($rolls)?> kast.</p>
<p>Summan av alla dina tärningsslag är <?=$dice->GetTotal()?></p>
<p>Snittvärdet av alla dina tärningsslag är <?=$dice->GetAverage()?></p>











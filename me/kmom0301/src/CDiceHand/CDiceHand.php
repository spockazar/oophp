<?php
/**
 * A hand of dices, with a graphical representation to roll
 *
 */
 class CDiceHand
 {
	 /**
	  * Properties
	  *
	  */
	 private $dices;
	 private $numDices;
	 private $sum;
	 private $sumRound;
	 
	 
	 /**
	  * Constructor
	  *
	  * @param int $numDices number of dices in the hand, default to 6
	  */
	 public function __construct($numDices=1)
	 {
		 for($i = 0; $i < $numDices; $i++)
		 {
			 $this->dices[] = new CDiceImage();
		 }
		 $this->numDices = $numDices;
		 $this->sum = 0;
		 $this->sumRound = 0;
	 }
	 
	 /**
	  * Roll all the dices in the hand
	  */
	 public function Roll()
	 {
		 $this->sum = 0;
		 for($i = 0; $i < $this->numDices; $i++)
		 {
			 $roll = $this->dices[$i]->Roll(1);
			 $this->sum += $roll;
			 $this->sumRound += $roll;
			 
			 if($roll == 1)
			 {
				 $this->InitRound();
			 }
			 
			 if($this->sumRound >= 100)
			 {
				 $this->InitRound();
			 }
		 }
	 }
	 
	 /**
	  * Get the sum of the latest roll
	  *
	  *@return int as the sum of the last roll, or 0 if no roll made
	  */
	  public function GetTotal()
	  {
		  return $this->sum;
	  }
	  
	  /**
	   * Start the round
	   */
	  public function InitRound()
	  {
		  $this->sumRound = 0;
	  }
	  
	  
	  /**
	   * Get the accumulated sum of the round
	   *
	   * @return int as a sum of the round, or 0 if no roll has been made
	   */
	  public function GetRoundTotal()
	  {
		  return $this->sumRound;
	  }
	  
	  /**
	   * Get the rolls as a series of images
	   *
	   *@return string as html representation of the latest roll
	   */
	  public function GetRollsAsImageList()
	  {
		  $html = "<ul class='dice'>";
		  foreach($this->dices as $dice)
		  {
			  $val = $dice->GetLastRoll();
			  $html .= "<li class='dice-{$val}'></li>";
		  }
		  $html .= "</ul>";
		  return $html;
	  }
	  
 }
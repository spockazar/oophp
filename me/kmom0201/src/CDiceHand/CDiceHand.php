 <?php
/**
 * A hand of dices
 *
 */
class CDiceHand {

  /**
   * Properties
   *
   */
  private $dices;
  private $numDices;
  private $sum;
  private $sumRound;
  public $save;
  private $counting;

  /**
   * Constructor
   *
   */
  public function __construct($numDices = 1) {
    for($i=0; $i < $numDices; $i++) {
      $this->dices[] = new CDiceImage();
    }
    $this->numDices = $numDices;
    $this->sum = 0;
    $this->sumRound = 0;
    $this->counting=0;
  }


  /**
   * Roll the dices (if 1 - reset the total sum)
   *
   */
  public function Roll() {
    $this->sum = 0;
    for($i=0; $i < $this->numDices; $i++) {
      $roll = $this->dices[$i]->Roll(1);
      if($roll==1){
        $this->ResetRound();
      }
      else{
        $this->sumRound += $roll;
      }
      $this->sum += $roll;
      $this->counting += 1;
     
    }
  }


  /**
   * Get the sum of the rolled dice
   *
   */
  public function GetTotal() {
    return $this->sum;
  }
    public function GetSave() {
     if($this->save==0){
     return "0";
     }
     else{
        return $this->save;
    }
  }
    public function GetDiceTotal(){
    return $this->counting;
    }
  
  /**
   * Reset the round-sum
   *
   */
  public function ResetRound() {
    $this->sumRound = 0;
  }
  
 public function Reset() {
    $this->save = 0;
    $this->sumRound = 0;
    $this->counting = 0;
  }


  
  /**
   * Get the sum of the round.
   *
    */
  public function GetRoundTotal() {
    return $this->sumRound;
  }

  /**
   * Get the rolls as a serie of images.
   *
    */
  public function GetRollsAsImageList() {
    $html = "<ul class='dice'>";
    foreach($this->dices as $dice) {
      $val = $dice->GetLastRoll();
      $html .= "<li class='dice-{$val}'></li>";
    }
    $html .= "</ul>";
    return $html;
  } 
  
  public function savepoints(){
    $storage = $this->sumRound;
    $storage += $this->save;

    $this->sumRound = 0;
    $this->save =+ $storage;
  }
  public function GameEnd(){
    $storage = $this->sumRound;
    $storage += $this->save;
    //if sumRound + save = 100 over -> GRATTIS
    if($storage >=100){
        return "Grattis! Du har kommit upp till 100! Kasta tärningen igen och börja om från början med en ny omgång";
    }
    else{
        return "";
    }
  }
  
  
}

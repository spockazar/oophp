<?php
include(__DIR__.'/config.php');

$hand = new CDiceHand(2);


$roll = isset($_GET['roll']) ? true : false;
$init = isset($_GET['init']) ? true : false;
$save = isset($_GET['save']) ? true : false; 


if($roll)
{
	$hand->Roll();
} else if ($init) {
	$hand->InitRound();
} else if($save) {
	$hand->SavePoints();
}



$glados['title'] = "blah";
$glados['main'] = <<<EOD
<h1>Dice Game</h1>
<p>Collect points</p>
<p><a href="?roll">Kasta</a></p>
<p><a href="?save">Spara din poäng</a></p>
<p><a href="?init">Börja om</a></p>
<p>{$hand->GetRollsAsImageList()}</p>
<p>{$hand->GetTotal()}</p>
<p>{$hand->GetRoundTotal()}</p>
<p>{$hand->GetSaved()}</p>
EOD;

include(GLADOS_THEME_PATH);




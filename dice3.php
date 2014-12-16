<?php
//inlcude the classes
include("bootstrap.php");

?><!doctype html>
<html lang="sv">
<meta charset="utf-8">
<title>Kasta tärning</title>
<link rel="stylesheet" type="text/css" href="dice.css">
<h1>Kasta tärning</h1>
<p>Här är tärningarna du har i din hand. <a href="?roll">Kasta</a> dem för attse ditt resultat.</p>

<?php
//Get the arguments from the query string
$roll = isset($_GET['roll']) ? true : false;

// Create the objects
$hand = new CDiceHand;

// Roll the dices
if($roll)
{
	$hand->Roll();
}
?>

<p><?=$hand->GetRollsAsImageList()?></p>
<?php if($roll): ?>
<p>Summan av alla tärningsslag är <?=$hand->GetTotal()?></p>
<?php endif; ?>


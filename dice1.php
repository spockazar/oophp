<!doctype html>
<html lang="sv">
<meta charset="utf-8">

<title>Giude till Objektorienterad PHP</title>

<h1>En tärning</h1>

<p>Tärningen kastas 6 gånger. Här är resultatet</p>

<?php

// Array to save all the results
$rolls = array();

// Rolls the dice
$times = 6; //Number of times the dice is to be rolled
for($i = 0; $i < $times; $i++) // Roll 6 times
{
	$rolls[] = rand(1, 6); // For each roll assign a random value between 1 and 6 to $rolls array
}


// Show the results
$html = "<ul>";
foreach($rolls as $val)
{
	$html .= "<li>{$val}</li>";
}
$html .= "</ul>";
?>
<?=$html?>

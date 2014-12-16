<?php
// Include the classes
include("bootstrap.php");
?>

<!doctype html>
<html lang="sv">
<meta charset="utf-8">
<title>Kasta tärning</title>
<link rel="stylesheet" type="text/css" href="dice.css">

<h1>Kasta tärning</h1>
<p>Kasta tärningen <a href="?roll=6">6 kast</a>, <a href="?roll=12">12 kast</a> eller <a href="?roll=24">24 kast</a>.</p>

<?php
$times = isset($_GET['roll']) && is_numeric($_GET['roll']) ? $_GET['roll'] : null;

$dice = new CDiceImage();
$dice->Roll($times);
$rolls = $dice->GetRollsArray();
?>

<p><?=$dice->GetRollsAsImageList()?></p>
<p>Summan av kastserien är <?=$dice->GetTotal()?></p>




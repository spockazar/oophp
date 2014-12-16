<?php
// Include the CDice class and create an instance of the class
include("bootstrap.php");
?>
<!doctype html>
<html lang="sv">
<meta charset="utf-8">

<title>Using CDice</title>

<h1>En tärning</h1>
<p>Kasta tärningen ett valfritt antal gånger: <a href="?roll=6&amp;faces=6">6 Kast</a>, <a href="?roll=12&amp;faces=12">12 kast</a>, <a href="?roll=24&amp;faces=24">24 kast</a></p>

<?php
$times = isset($_GET['roll']) && is_numeric($_GET['roll']) ? $_GET['roll'] : 6;

$faces = isset($_GET['faces']) && is_numeric($_GET['faces']) ? $_GET['faces'] : 6;


$dice = new CDice($faces);
$histogram = new CHistogram();

$dice->Roll($times);
$rolls = $dice->GetRollsArray();

$html = null;
foreach($rolls as $val)
{
	$html .= "{$val}, ";
}
?>

<?=$histogram->GetHistogramIncludeEmpty($rolls, $faces)?>
<p>Kastserien var <?=$html?></p>

<p>Tärningen har <?=$dice->GetFaces()?> sidor.</p>
<p>Du gjorde <?=count($rolls)?> kast.</p>
<p>Summan av alla tärningsslag är <?=$dice->GetTotal()?></p>
<p>Snittvärdet av alla tärningsslag är <?=$dice->GetAverage()?></p>

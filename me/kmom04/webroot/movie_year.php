7<?php
/**
 * this is a glados page controller
 *
 */
include(__DIR__."/config.php");


//connec to db
$sql = "mysql:host=localhost;dbname=Movie";
$login = "annper";
$password = "password";
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");

$pdo = new PDO($sql, $login, $password, $options);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

//storing parameters
$year1 = isset($_GET['year1']) && !empty($_GET['year1']) ? $_GET['year1'] : null;
$year2 = isset($_GET['year2']) && !empty($_GET['year2']) ? $_GET['year2'] : null;

if($year1 && $year2) {
	$sql = "SELECT * FROM Movie WHERE YEAR >= ? AND YEAR <= ?;";
	$params = array($year1, $year2);
} else if($year1) {
	$sql = "SELECT * FROM Movie WHERE YEAR >= ?;";
	$params = array($year1);
} else if($year2) {
	$sql = "SELECT * FROM Movie WHERE YEAR <= ?;";
	$params = array($year2);
} else {
	$sql = "SELECT * FROM Movie;";
	$params = null;
}

$sth = $pdo->prepare($sql);
$sth->execute($params);
$res = $sth->fetchAll();

//put result in table rows
$tr = "<tr><th>Rad</th><th>Id</th><th>Bild</th><th>Titel</th><th>År</th></tr>";
foreach($res as $key => $val) {
	$tr .= "<tr><td>{$key}</td><td>{$val->id}</td><td><img width='80' height='40' src='{$val->image}' alt='{$val->title}'/></td><td>{$val->title}</td><td>{$val->YEAR	}</td></tr>";
}


$year1 = htmlentities($year1);
$year2 = htmlentities($year2);
$paramsPrint = htmlentities(print_r($params, 1));

$glados['title'] = "Sök år i filmdatabasen";

$glados['main'] = <<<EOD
<h1>{$glados['title']}</h1>
<form>
	<fieldset>
	<legend>Sök</legend>
	<p><label>Skapad mellan åren:
		<input type="text" name="year1" value="{$year1}"/>
		-
		<input type="text" name="year2" value="{$year2}"/>
	</label></p>
	<p><input type="submit" name="submit" value="Sök"></p>
	<p><a href="?">Visa alla</a></p>
	</fieldset>
</form>

<p>Resultatet fråm SQL-frågan:</p>
<p><code>{$sql}</code></p>
<p><pre>{$paramsPrint}</pre></p>
<table>
	{$tr}
</table>
EOD;

include(GLADOS_THEME_PATH);
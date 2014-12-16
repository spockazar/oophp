<?php
/**
 * This is a glados page controller
 *
 */
include(__DIR__ . "/config.php");

//connect to the database
$dsn = "mysql:host=localhost;dbname=Movie";
$login = "annper";
$password = "password";
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");

$pdo = new PDO($dsn, $login, $password, $options); 

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


//sorting parameters
$title = isset($_GET['title']) ? $_GET['title'] : null;

if($title)
{
	$sql = "SELECT * FROM Movie WHERE title LIKE ?;";
	$params = array($title);
}
else
{
	$sql = "SELECT * FROM Movie;";
	$params = null;
}

$sth =  $pdo->prepare($sql);
$sth->execute($params);
$res = $sth->fetchAll();

//put result in table
$tr = "<tr><th>Rad</th><th>Id</th><th>Bild</th><th>Titel</th><th>År</th></tr>";
foreach($res as $key => $val) {
	$tr .= "<tr><td>{$key}</td><td>{$val->id}</td><td><img width='80' height='40' src='{$val->image}' alt='{$val->title}'/></td><td>{$val->title}</td><td>{$val->YEAR}</td></tr>";
}

$glados['title'] = "Sök titel i filmdatabasen";

$title = htmlentities($title);
$paramPrint = htmlentities(print_r($params, 1));


$glados['main'] = <<<EOD
<h1>{$glados['title']}</h1>
<form>
	<fieldset>
    	<legend>Sök</legend>
        <p><label>Titel (delsträng, använd % som *): <input type="search" name="title" value="{$title}"/></label></p>
        <p><a href="?">Visa alla</a></p>
    </fieldset>
</form>
<p>Resultatet från SQL-frågan:</p>
<p><code>{$sql}</code></p>
<p><pre>{$paramPrint}</pre><p>
<table>
{$tr}
</table>
EOD;

include(GLADOS_THEME_PATH);
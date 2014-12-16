<?php
/**
 * Glados page controller
 *
 */
include(__DIR__ . '/config.php'); //include the cinfig file that creates the glados variable

$dsn = "mysql:host=localhost;dbname=Movie;";
$login = "annper";
$password = "password";
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");

//tries to connect, throws an exception if it fails
//try
//{
	$pdo = new PDO($dsn, $login, $password, $options);
//} catch(Exception $e){
//	throw new PDOException('Could not connect to database, hiding connection details.'); //Hides teh connection details
//}


//sets the default fetch mode
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 

// Do SELECT from a db table
$sql = "SELECT * FROM Movie"; //set the query and save it to the variable $sql
$sth = $pdo->prepare($sql); // perpare the query
$sth->execute(); //execute the query 
$res = $sth->fetchAll(); // saves the result from the query in a two dimensional array

// save the result fromt he query into a html table
$tr = "<tr><th>Rad</th><th>ID</th><th>Bild</th><th>Titel</th><th>År</th></tr>";
foreach($res as $key => $val)
{
	$tr .= "<tr><td>{$key}</td><td>{$val->id}</td><td><img width='80' height='40'alt='{$val->title}' src='{$val->image}'/></td><td>{$val->title}</td><td>{$val->YEAR}</td></tr>";
}


//glados
$glados['title'] = "PHP och PDO";

$glados['main'] = <<<EOD
<article>
	<h1>{$glados['title']}</h1>
	<p>Resultatet från SQL Frågan:</p>
	<table>
		{$tr}
	</table>
</article>
EOD;

// the rendering phase
include(GLADOS_THEME_PATH);
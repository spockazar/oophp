<?php
// connect to a MySQL database using PHP PDO
$dsn = 'mysql:host=localhost;dbname=Movie;';
$login = 'acronym';
$password = 'password';
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");
$pdo = new PDO($dsn, $login, $password, $options);

// set the default fetch mode
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 


//Do SELECT from a db table
$sql = "SELECT * FROM Movie;"; //set the query
$sth = $pdo->prepare($sql); // prepare the query
$sth->execute(); // execute the query
$res = $sth->fetchAll(); //save the result in a 2-dimensional array 

$html = "<ul>";
foreach($res as $movie)
{
	$html .= "<li>{$movie}</li>";
}
$html = "</ul>";

echo $html;

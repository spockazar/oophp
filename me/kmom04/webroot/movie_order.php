<?php
/**
 * glados page controller
 *
 */
include(__DIR__ . "/config.php");

//connect to database
$dsn = "mysql:host=localhost;dbname=Movie";
$login = "annper";
$password = "password";
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");
$pdo = new PDO($dsn, $login, $password, $options);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


/**
 * function to create links for sorting
 * 
 * @param string $column the name of the database column to sort by
 * @return string with links to order column
 */
function orderby($column) {
	return "<span class='orderby'><a href='?orderby={$column}&order=asc'>&darr;</a><a href='?orderby={$column}&order=desc'>&uarr;</a></span>";
}


//parameters for sorting	
$orderby = isset($_GET['orderby']) ? $_GET['orderby'] : 'id';
$order = isset($_GET['order']) ? strtolower($_GET['order']) : 'asc';


//check that incomming params are valid
in_array($orderby, array('id', 'title', 'YEAR')) or die('Check: not valid column');
in_array($order, array('asc', 'desc')) or die('Check: not valid sort order');


//select for a table
$sql = "SELECT * FROM VMovie ORDER BY $orderby $order;";
$sth = $pdo->prepare($sql);
$sth->execute(array($orderby, $order));
$res = $sth->fetchAll();


//save result in a table
$tr = "<tr><th>Rad</th><th>Id " . orderby('id'). "</th><th>Bild</th><th>Titel " . orderby('title') ."</th><th>År ". orderby('YEAR')."</th><th>Genre</th></tr>";
foreach($res as $key => $val) {
	$tr .= "<tr><td>{$key}</td><td>{$val->id}</td><td><img width='80' height='40' src='{$val->image}' alt='{$val->title}'/></td><td>{$val->title}</td><td>{$val->YEAR}</td><td>{$val->genre}</td></tr>";
}


//glados
$glados['title'] = "Sortera i tabellen";

$glados['main'] = <<<EOD
<h1>{$glados['title']}</h1>
<p>Resultatet frpn SQL-frågan:</p>
<p><code>{$sql}</code><p>
<table>
	{$tr}
</table>
EOD;

include(GLADOS_THEME_PATH);

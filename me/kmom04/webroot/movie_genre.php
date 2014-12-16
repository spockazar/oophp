<?php
/**
 * this is a glados page controller
 *
 */
include(__DIR__."/config.php");

// connect to db
$dsn = "mysql:host=localhost;dbname=Movie";
$login = "annper";
$password = "password";
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");
$pdo = new PDO($dsn, $login, $password, $options);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


//get parameters
$genre = isset($_GET['genre']) ? $_GET['genre'] : null;

//get all active genres
$sql = '
	SELECT DISTINCT G.name
	FROM Genre AS G
		INNER JOIN Movie2Genre AS M2G
			ON G.id = M2G.idGenre
';

$sth = $pdo->prepare($sql);
$sth->execute();
$res = $sth->fetchAll();

$genres = null;
foreach($res as $val) {
	$genres .= "<a href=?genre={$val->name}>{$val->name}</a> ";
}

//select from a table
if($genre) {
	$sql = '
		SELECT 
			M.*,
			G.name AS genre
		FROM Movie AS M
			LEFT OUTER JOIN Movie2Genre AS M2G
				ON M.id = M2G.idMovie
			INNER JOIN Genre AS G
				ON M2G.idGenre = G.id
			WHERE G.name = ?
			;
		';
	$params = array($genre);
} else {
	$sql = "SELECT * FROM VMovie;";
	$params = null;
}
$sth = $pdo->prepare($sql);
$sth->execute($params);
$res = $sth->fetchAll();

//put results in a table
$tr = "<tr><th>Rad</th><th>Id</th><th>Bild</th><th>Titel</th><th>År</th><th>Genre</th></tr>";
foreach($res as $key => $val) {
	$tr .= "<tr><td>{$key}</td><td>{$val->id}</td><td><img width='80' heigh='40' src='{$val->image}' alt='{$val->title}'/></td><td>{$val->title}</td><td>{$val->YEAR}</td><td>{$val->genre}</td></tr>";
}

$paramsPrint = htmlentities(print_r($params, 1));

$glados['title'] = "Sortera efter genre";

$glados['main'] = <<<EOD
<h1>{$glados['title']}</h1>
<form>
<fieldset>
<legend>Välj genre</legend>
	<p><label>Välj genre:</label><br/>{$genres}</p>
	<p><a href='?'>Visa alla</a></p>
</fieldset>
</form>

<p>Resultatet från SQL-frågan:</p>
<pre>{$sql}</pre>
<pre>{$paramsPrint}</pre>
<table>
	{$tr}	
</table>

EOD;

include(GLADOS_THEME_PATH);
<?php
/**
 * glados page controller
 *
 */
include(__DIR__."/config.php");


//conect to db
$dsn = "mysql:host=localhost;dbname=Movie";
$login = "annper";
$password = "password";
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");
$pdo = new PDO($dsn, $login, $password, $options);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

/**
 * Use current query string as base, modify it in accordance with options and return the modified string
 *
 * @param array $options to set/change
 * @param string $prepend this to the resulting query string
 * @return string with and updated query string
 */
function getQueryString($options, $prepend='?') {
	//parsequerystring into array	
	$query = array();
	parse_str($_SERVER['QUERY_STRING'], $query);
	
	//modify the query string with new options
	$query = array_merge($query, $options);
	
	//return the modified query string
	return $prepend . http_build_query($query);
}


/** 
 * Create links for hits per page
 * 
 * @param array $hits a list of hits-options to display
 * @return string as the link to this page
 */
function getHitsPerPage($hits) {
	$nav = "Träffar per sida ";
	foreach($hits as $val) {
		$nav .= "<a href='". getQueryString(array('hits' => $val)) . "'>$val</a> ";
	}
	return $nav;
}


/**
 * Create navigation among pages
 * 
 * @param integer $hits per page
 * @param integer $page current page
 * @param integer $max number of pages
 * @param integer $min is the first page number, usually 0 or 1
 * @return string as a link to this page
 */
function getPageNavigation($hits, $page, $max, $min=1) {
	$nav = "<a href='". getQueryString(array('page' => $min)) ."'>&lt;&lt;</a> ";
	$nav .= "<a href='". getQueryString(array('page' => ($page > $min ? $page - 1 : $min))) ."'>&lt;</a> ";
	
	for($i=$min; $i<$max; $i++) {
		$nav .= "<a href='". getQueryString(array('page' => $i)) ."'>$i</a> ";
	}
	$nav .= "<a href='". getQueryString(array('page' => ($page > $max ? $page + 1 : $max))) ."'>&gt;</a> ";
	$nav .= "<a href='". getQueryString(array('page' => $max)) ."'>&gt;&gt;</a> ";
	return $nav;
}


//params for sorting
$hits = isset($_GET['hits']) ? $_GET['hits'] : 8;
$page = isset($_GET['page']) ? $_GET['page'] : 1;

//check incoming values are valide
is_numeric($hits) or die('Check: Hits must be numeric');
is_numeric($page) or die('Check: Page must be numeric');



//get max number of pages from table, for navigation
$sql = "SELECT COUNT(id) AS rows  FROM VMovie;";
$sth = $pdo->prepare($sql);
$sth->execute();
$res = $sth->fetchAll();

//get maximal pages
$max = ceil($res[0]->rows / $hits);


//SELECT from a table
$sql = "SELECT * FROM VMovie LIMIT $hits OFFSET " . (($page -1) * $hits);
$sth = $pdo->prepare($sql);
$sth->execute();
$res = $sth->fetchAll();

//put the result in a table
$tr = "<tr><th>Rad</th><th>Id</th><th>Bild</th><th>Titel</th><th>År</th><th>Genre</th></tr>";
foreach($res as $key => $val) {
	$tr .= "<tr><td>{$key}</td><td>{$val->id}</td><td><img width='80' height='40' src='{$val->image}' alt='{$val->title}'/></td><td>{$val->title}</td><td>{$val->YEAR}</td><td>{$val->genre}</td></tr>";
}

//glados
$glados['title'] = "Visa resultatet över flera sidor";

$hitsPerPage = getHitsPerPage(array(2, 4, 8));
$navigationPage = getPageNavigation($hits, $page, $max);

$glados['main'] = <<<EOD
<h1>{$glados['title']}</h1>
<p>Resultatet från SQL-frågan:</p>
<p><code>{$sql}</code></p>
<div class='dbtable'>
	<div class='rows'>{$hitsPerPage}</div>
	<table>
		{$tr}
	</table>
<div class='pages'>{$navigationPage}</div>
</div>
EOD;

include(GLADOS_THEME_PATH);
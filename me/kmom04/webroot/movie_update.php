<?php
include(__DIR__.'/config.php');


$db = new CDatabase($glados['database']);

$sql = "SELECT * FROM Movie;";
$res = $db->ExecuteSelectQueryAndFetchAll($sql);


// Put results into a HTML-table
$tr = "<tr><th>Rad</th><th>Id</th><th>Bild</th><th>Titel</th><th>År</th><th></th></tr>";
foreach($res AS $key => $val) {
  $tr .= "<tr><td>{$key}</td><td>{$val->id}</td><td><img width='80' height='40' src='{$val->image}' alt='{$val->title}' /></td><td>{$val->title}</td><td>{$val->YEAR}</td><td class='menu'><a href='movie_edit.php?id={$val->id}'>Edit</a></td></tr>";
}


// Do it and store it all in variables in the Anax container.
$glados['title'] = "Välj och uppdatera info om film";



$glados['main'] = <<<EOD
<h1>{$glados['title']}</h1>
<table>
{$tr}
</table>


EOD;

include(GLADOS_THEME_PATH);
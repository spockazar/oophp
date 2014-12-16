<?php

include(__DIR__.'/config.php');

$db = new CDatabase($glados['database']);

$title  = isset($_POST['title']) ? strip_tags($_POST['title']) : null;
$create = isset($_POST['create'])  ? true : false;
$acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;

isset($acronym) or die('Check: You must login to edit.');

// Check if form was submitted
if($create) {
  $sql = 'INSERT INTO Movie (title) VALUES (?)';
  $db->ExecuteQuery($sql, array($title));
  $db->SaveDebug();
  header('Location: movie_edit.php?id=' . $db->LastInsertId());
  exit;
}

$glados['title'] = "Skapa";
$glados['main'] = <<<EOD
<h1>Skapa</h1>
<form method="get">
<fieldset>
<legend>Lägg till film</legend>
<p><label>Titel:<br/><input type='text' name='title' /></label></p>
<p><input type='submit' name='create' value="Skapa"</p>
</fieldset>
</form>
EOD;

include(GLADOS_THEME_PATH);
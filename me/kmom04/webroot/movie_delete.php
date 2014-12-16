<?php
include(__DIR__ . '/config.php');

$db = new CDatabase($glados['database']);

// Get parameters 
$id     = isset($_POST['id'])    ? strip_tags($_POST['id']) : (isset($_GET['id']) ? strip_tags($_GET['id']) : null);
$delete = isset($_POST['delete'])  ? true : false;
$acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;

// Check that incoming parameters are valid
isset($acronym) or die('Check: You must login to delete.');

// Check if form was submitted
$output = null;
if($delete) {

  $sql = 'DELETE FROM Movie2Genre WHERE idMovie = ?';
  $db->ExecuteQuery($sql, array($id));
  $db->SaveDebug("Det raderades " . $db->RowCount() . " rader från databasen.");

  $sql = 'DELETE FROM Movie WHERE id = ? LIMIT 1';
  $db->ExecuteQuery($sql, array($id));
  $db->SaveDebug("Det raderades " . $db->RowCount() . " rader från databasen.");

  header('Location: movie_view_delete.php');
}


// Select information on the movie 
$sql = 'SELECT * FROM Movie WHERE id = ?';
$params = array($id);
$res = $db->ExecuteSelectQueryAndFetchAll($sql, $params);

if(isset($res[0])) {
  $movie = $res[0];
}
else {
  die('Failed: There is no movie with that id');
}


$glados['title'] = "Ta bort film";

$glados['main'] = <<<EOD
<h1>{$glados['title']}</h1>
<form method='post'>
  <fieldset>
  <legend>Radera film: {$movie->title}</legend>
  <input type='hidden' name='id' value='{$id}'/>
  <p><input type='submit' name='delete' value='Radera film'/></p>
  </fieldset>
</form>
EOD;

include(GLADOS_THEME_PATH);
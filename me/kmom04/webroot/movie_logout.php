<?php 
/**
 * This is a Anax pagecontroller.
 *
 */
// Include the essential config-file which also creates the $anax variable with its defaults.
include(__DIR__.'/config.php'); 



// Get incoming parameters
$acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;

if($acronym) {
  $output = "Du är inloggad som: $acronym ({$_SESSION['user']->name})";
}
else {
  $output = "Du är INTE inloggad.";
}


// Logout the user
if(isset($_POST['logout'])) {
  unset($_SESSION['user']);
  header('Location: movie_logout.php');
}



// Do it and store it all in variables in the Anax container.
$glados['title'] = "Logout";

$glados['main'] = <<<EOD
<h1>{glados['title']}</h1>

<form method=post>
  <fieldset>
  <legend>Login</legend>
  <p><input type='submit' name='logout' value='Logout'/></p>
  <p><a href='movie_login.php'>Login</a></p>
  <output><b>{$output}</b></output>
  </fieldset>
</form>

EOD;



// Finally, leave it all to the rendering phase of glados.
include(GLADOS_THEME_PATH);
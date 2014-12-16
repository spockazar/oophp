<?php
/**
 * this is a glados page controller
 *
 */
include(__DIR__ . "/config.php");

$sql	= 	'movie.sql';
$mysql	=	'C:\wamp\bin\mysql\mysql5.5.24\bin\mysql.exe';
$host	= 	'localhost';
$login	=	'annper';
$password = 'password';

if(isset($_POST['restore']) || isset($_GET['restore'])) {
	$cmd = "$mysql -h{$host} -u{$login} -p{$password} < $sql 2>&1";
	$res = exec($cmd);
	$output = "<p>Databasen är återställd via kommandot</br><code>{$cmd}</code></p>";
}

$glados['title'] = "Återställ databasem";

$glados['main'] = <<<EOD
<article>
<h1>{$glados['title']}</h1>
	<form method="post">
		<input type="submit" name="restore" value="Återställ databasen"/>
		<output>{$output}</output>
	</form>
</article>
EOD;


include(GLADOS_THEME_PATH);
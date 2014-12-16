<?php
include(__DIR__.'/config.php');

$glados['stylesheets'][] = "css/dice.php";

// Get the arguments from the query strings
$roll = isset($_GET['roll']) ? true : false;
$init = isset($_GET['init']) ? true : false;

// Create the object and get it from the session
if(isset($_SESSION['dicehand']))
{
	//echo "<i>Objektet finns redans i sessionen</i>";
	$hand = $_SESSION['dicehand'];
}
else
{
	//echo "<i>Objektet finns inte i sessionen, skapa ett nytt objekt och lagra det i sessionen</i>";
	$hand = new CDiceHand();
	$_SESSION['dicehand'] = $hand;
}

if(isset($_GET['destroy']))
{
	//Unset all the session variables
	$_SESSION = array();
	
	//If deleting the session, also delete the session cookie
	// Note this destroys the session and not just the session data
	if(ini_get("session.use_cookies")) //ini_get returns the value of the configuration option on success
	{
		$params = session_get_cookie_params(); //returns array with current sessions cookie information
		setcookie(session_name(), '', time() - 24000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
		);
	}
	
	// finally destroy the session 
	session_destroy();
	echo "Sessionen raderas, <a href='?'>Starta om spelet</a>";
	exit;
}



//Roll the dices
if($roll)
{
	$hand->Roll();
} 
else if($init) 
{
	$hand->InitRound();
}


$glados['title'] = 'Tärningsspelet 100';
$glados['main'] = <<<EOD
<article>
	<h1>Tärningsspelet 100</h1>
	<p>Kasta tärningen tills du samlat 100 poäng. Får du en 1:a förlorar du alla dina poäng.</p>
	<p><a href="?init">Starta en ny runda</a></p>
	<p><a href="?roll">Gör ett nytt kast</a></p>
	<p><a href="?destroy">Förstör sessionen</a></p>
	
	<p>{$hand->GetRollsAsImageList()}</p>
	<p>Poängen för det här kastet var: {$hand->GetTotal()}</p>
	<p>Din totala poäng är:{$hand->GetRoundTotal()}</p>
</article>
EOD;

//  rendering phase of glados
include(GLADOS_THEME_PATH); 










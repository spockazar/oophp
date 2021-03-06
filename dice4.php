<?php
include("bootstrap.php");

//Start a named session
session_name('oophp');
session_start();

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

?><!doctype html>
<html lang="sv">
<meta charset="utf-8">
<title>Kasta tänring med sessioner</title>
<link rel="stylesheet" type="text/css" href="dice.css">
<h1>Kasta två tärningar och försök att komma så nära 21 som möjligt</h1>
<p><a href="?init">Starta en ny runda</a></p>
<p><a href="?roll">Gör ett nytt kast</a></p>
<p><a href="?destroy">Förstör sessionen</a></p>

<?php
// Get the arguments from the query strings
$roll = isset($_GET['roll']) ? true : false;
$init = isset($_GET['init']) ? true : false;

// Create the object and get it from the session
if(isset($_SESSION['dicehand']))
{
	echo "<i>Objektet finns redans i sessionen</i>";
	$hand = $_SESSION['dicehand'];
}
else
{
	echo "<i>Objektet finns inte i sessionen, skapa ett nytt objekt och lagra det i sessionen</i>";
	$hand = new CDiceHand();
	$_SESSION['dicehand'] = $hand;
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
?>

<p><?=$hand->GetRollsAsImageList()?></p>

<?php if($roll): ?>
<p>Summan av detta kast blev <?=$hand->GetTotal()?></p>
<?php endif; ?>

<p>Summan i den här rundan hittills är <?=$hand->GetRoundTotal()?></p>






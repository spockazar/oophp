<?php 
include(__DIR__.'/config.php'); 
// style
$glados['stylesheets'][]        = 'css/dice.css';
$roll = isset($_GET['roll']) ? true : false;
$save = isset($_GET['save']) ? true : false;



if(isset($_SESSION['Hand'])) {
  $hand = $_SESSION['Hand'];
}
else {
  $hand = new CDiceHand();
  $_SESSION['Hand'] = $hand;
}

if(isset($_GET['session_destroy'])) {
  // Unset all of the session variables.
  $_SESSION = array();

  // If it's desired to kill the session, also delete the session cookie.
  // Note: This will destroy the session, and not just the session data!
  if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
          $params["path"], $params["domain"],
          $params["secure"], $params["httponly"]
      );
  }

  // Finally, destroy the session.
  session_destroy();
  echo "Sessionen raderas, <a href='?'>starta om spelet</a>";
  exit;
}

if(!$hand->GameEnd()==""){
 $hand->Reset() ;
}

// Roll the dices 
if($roll) {
  $hand->Roll();
}
if($save){
    $hand->savepoints();
}

// lägg till värden i variblerna
$glados['title'] = "TärningsSpel";

$glados['main'] = <<<EOD

<article class="readable">
<h1>Tärningsspelet 100</h1>
<p>Tärningsspelet 100 är ett enkelt, men roligt, tärningsspel. Det gäller att sammla ihop 100 poäng! I varje omgång kastar en spelare tärning tills hon väljer att stanna och spara undan poängen eller tills det dyker upp en 1:a och hon förlorar alla poäng som samlats in i rundan. Se hur få kast du kan göra för att nå 100!</p>
<hr>
<br>
<p>{$hand->GameEnd()}</p>
<div id="dice"><p>{$hand->GetRollsAsImageList()}</div>

<p>Antal kast: <b><u>{$hand->GetDiceTotal()}</u></b></p>
<h2 class="diceLink"><a href='?roll'>Gör ett nytt kast</a></h2>

 <div id="info">
<p>Summan av detta kast blev <b><u>{$hand->GetTotal()}</u></b>.</p>
<p>Summan i denna spelrundan är hittills <b><u>{$hand->GetRoundTotal()}</u></b>.</p>
<p>Sparade poäng: <b><u>{$hand->GetSave()}</u></b></p>
</div>
 <h2 class="diceLink"><a href='?save'>Spara dina nuvarande poäng</a></h2>
<h2 class="diceLink"><a href='?session_destroy'> Avsluta </a> </h2>
</article>
EOD;


//  rendering phase of glados.
include(GLADOS_THEME_PATH); 
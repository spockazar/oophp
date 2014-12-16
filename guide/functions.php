<?php
/*
 *
 * Funktion som ger dig länken till nuvarande sida.
 *
 */
function getCurrentUrl() {
  $url = "http";
  $url .= (@$_SERVER["HTTPS"] == "on") ? 's' : '';
  $url .= "://";
  $serverPort = ($_SERVER["SERVER_PORT"] == "80") ? '' :
    (($_SERVER["SERVER_PORT"] == 443 && @$_SERVER["HTTPS"] == "on") ? '' : ":{$_SERVER['SERVER_PORT']}");
  $url .= $_SERVER["SERVER_NAME"] . $serverPort . htmlspecialchars($_SERVER["REQUEST_URI"]);
  return $url;
}


/**
 *
 * Skriver ut innehållet i en array 
 *
 */

function dump($array) {
  echo "<pre>" . htmlentities(print_r($array, 1)) . "</pre>";
}


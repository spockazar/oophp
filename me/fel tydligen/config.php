<?php
/**
 * Config-file for Glados. Change settings here to affect installation.
 *
 */

/**
 * Set the error reporting.
 *
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly


/**
 * Start the session.
 *
 */
session_name(preg_replace('/[:\.\/-_]/', '', __DIR__));
session_start();


/**
 * Define Glados paths.
 *
 */
define('GLADOS_INSTALL_PATH', __DIR__ . '/../glados');
define('GLADOS_THEME_PATH', GLADOS_INSTALL_PATH . '/theme/render.php');


/**
 * Include bootstrapping functions.
 *
 */
include(GLADOS_INSTALL_PATH . '/src/bootstrap.php');


/**
 * Create the Glados variable.
 *
 */
$glados = array();


/**
 * Site wide settings.
 *
 */
$glados['lang']         = 'sv';
$glados['title_append'] = ' | oophp kursmaterial';

$glados['header'] = <<<EOD
<img class='sitelogo' src='img/glados-potato.png' alt='oophp Logo'/>
<span class='sitetitle'>Me oophp</span>
<span class='siteslogan'>Min Me-sida i kursen Databaser och Objektorienterad PHP-programmering</span>
EOD;

$glados['footer'] = <<<EOD
<footer><span class='sitefooter'>Copyright (c) Annie Persson | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a></span></footer>
EOD;

$glados['byline'] = <<<EOD
<footer class="byline">
  <p>Cathrine studerar kurspaketet Databaser och webbprogrammering vid Blekinges Tekniska Högskola</p:
</footer>
EOD;



/**
 * The navbar
 *
 */
//$glados['navbar'] = null; // To skip the navbar
$glados['navbar'] = array(
  'class' => 'nb-plain',
  'items' => array(
    'hem'         => array('text'=>'Hem',         'url'=>'me.php',          'title' => 'Me-sidan'),
    'redovisning' => array('text'=>'Redovisning', 'url'=>'report.php', 'title' => 'Redovisningar'),
    'kallkod'     => array('text'=>'Källkod',     'url'=>'source.php',      'title' => 'Källkod'),
  ),
  'callback_selected' => function($url) {
    if(basename($_SERVER['SCRIPT_FILENAME']) == $url) {
      return true;
    }
  }
);



/**
 * Theme related settings.
 *
 */
//$glados['stylesheet'] = 'css/style.css';
$glados['stylesheets'] = array('css/style.css');
$glados['favicon']    = 'anax.ico';



/**
 * Google analytics.
 *
 */
$glados['google_analytics'] = 'UA-22093351-1'; // Set to null to disable google analytics
<?php 
/**
 * This is a Anax pagecontroller.
 *
 */
// Include the essential config-file which also creates the $anax variable with its defaults.
include(__DIR__.'/config.php'); 


// Add style for csource
$anax['stylesheets'][] = 'css/source.css';


// Create the object to display sourcecode
//$source = new CSource();
$source = new CSource(array('secure_dir' => '..', 'base_dir' => '..'));


// Do it and store it all in variables in the Anax container.
$anax['title'] = "Visa källkod";

$anax['main'] = "<h1>Visa källkod</h1>\n" . $source->View();


// Finally, leave it all to the rendering phase of Anax.
include(ANAX_THEME_PATH);
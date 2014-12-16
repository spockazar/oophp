<?php 
/**
 * This is a Glados pagecontroller.
 *
 */
// Include the essential config-file which also creates the $glados variable with its defaults.
include(__DIR__.'/config.php'); 


// Add style for csource
$anax['stylesheets'][] = 'css/source.css';


// Create the object to display sourcecode
//$source = new CSource();
$source = new CSource(array('secure_dir' => '..', 'base_dir' => '..'));


// Do it and store it all in variables in the Glados container.
$glados['title'] = "Visa källkod";

$glados['main'] = "<h1>Visa källkod</h1>\n" . $source->View();


// Finally, leave it all to the rendering phase of Glados.
include(GLADOS_THEME_PATH);
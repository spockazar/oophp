<?php 
/**
 * This is a Glados pagecontroller.
 *
 */
// Include the essential config-file which also creates the $glados variable with its defaults.
include(__DIR__.'/config.php'); 
 
 
// Do it and store it all in variables in the Glados container.
$anax['title'] = "404";
$anax['header'] = "";
$anax['main'] = "This is a Glados 404. Document is not here.";
$anax['footer'] = "";
 
// Send the 404 header 
header("HTTP/1.0 404 Not Found");
 
 
// Finally, leave it all to the rendering phase of Glados.
include(GLADOS_THEME_PATH);
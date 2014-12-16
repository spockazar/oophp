<?php 
/**
 * This is a Glados pagecontroller.
 *
 */
// Include the essential config-file which also creates the $glados variable with its defaults.
include(__DIR__.'/config.php'); 
 
 
// Do it and store it all in variables in the Glados container.
$glados['title'] = "Hello World";
 
$glados['header'] = <<<EOD
<img class='sitelogo' src='img/glados-potato.png' alt='Glados Logo'/>
<span class='sitetitle'>Glados webbtemplate</span>
<span class='siteslogan'>Återanvändbara moduler för webbutveckling med PHP</span>
EOD;
 
$glados['main'] = <<<EOD
<h1>Hej Världen</h1>
<p>Detta är en exempelsida som visar hur Glados ser ut och fungerar.</p>
EOD;
 
$glados['footer'] = <<<EOD
<footer><span class='sitefooter'>Copyright (c) Mikael Roos (me@mikaelroos.se) | <a href='https://github.com/mosbth/Anax-base'>Anax på GitHub</a> | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a></span></footer>
EOD;
 
 
// Finally, leave it all to the rendering phase of Anax.
include(GLADOS_THEME_PATH);
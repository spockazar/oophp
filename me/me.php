<?php
/**
 * This is a glados pagecontroller
 *
 */
// Include the essential config-file which also creates the $glados variable
include(__DIR__ . "/config.php");


// Do it and store all the variables in the Glados container
$glados['title'] = "Om mig";

$glados['main'] = <<<EOD
<article>
	<h1>Om mig</h1>
	
	<p>Det här är min me-sida för kursen oophp.</p>
	<p>Mitt namn är Cathrine. Jag är uppvuxen i Skåne men bor numer i Skottland. Jag läser kurspaketet Databaser och Webbprogrammering vid Blekinges Tekniska Högskola på deltid. Resterande tiden jobbar jag eller kollar på Star Trek.</p>

{$glados['byline']}
</article>

EOD;

// finally leave it all to the rendering phase of Glados
include(GLADOS_THEME_PATH);



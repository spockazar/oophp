<?php
/**
 * This in a Glados page controller
 *
 */
// Include the config-file taht creates the $glados variable
include(__DIR__ . "/config.php");


// Do it and store all the variables in the $glados variable
$glados['title'] = "Redovisning";

$glados['main'] = <<<EOD
<article>
	<h1>Redovisning för varje kursmoment</h1>
	
	<h2>Kursmoment 1:Kom igång med Objektorienterad PHP</h2>
	<p>Jag använder WAMP-server och kodar i Dreamweaver. Laddar upp filerna till studentservern med FileZilla, och använder FireFox som webbläsare.</p>
	<p>Det här kursmomentet var jobbigt och svårt. Det var mycket kod och jag kände att jag förstod väldigt lite även efter att ha läst all kurslitteratur. Tyckte att det var svårt att förstå hur Anax skulle fungera och hur sidorna hängde ihop. Hade problem med att förstå logiken i var koden skulle ligga någonstans när man delade upp den. Antar att det kommer kännas mer naturligt längre in i kursen men just nu är det svårt.</p>
	
	<p>Jag döpte webbmallen till Glados efter karaktären GLaDOS (Genetic Lifeform and Disk Operating System) från spelet Portal. Strukturen tyckte jag var svår att förstå så jag gjorde inga förbättringar eller ändringar då jag först tycker att jag behöver lära mig mer om hur det fungerar.</p>
	
	<p>Det var roligt att se hur git fungerade. Har hört om det tidigare och tittat en del på det själv tidigare men aldrig riktigt förstått hur man ska jobba med det. Tyckte att genomgången här var lätt att förstå och hoppas använda det mer i framtiden.</p>
	
	<p>Guiden kom igång med PHP var bra och jag kände att jag hängde med där i alla fall och hade koll på det mesta. Det är bara Anax och hur koden delas upp som var svårt att förstå. Jag ser fram emot att lära mig mer om hur klasser fungerar då det är ett koncept som jag länge har haft svårt att riktigt förstå mig på.</p>
</article>

EOD;


// Leave it to the rendering part of Glados
include(GLADOS_THEME_PATH);
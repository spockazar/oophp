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
	<p>Jag använder WAMP-server och skriver min kod i Dreamweaver. Min webbläsare är FireFox och jag använder FileZilla för att ladda upp filerna till studentservern.</p>
	
	<p>Jag började med att jobba igen guiden till att komma igång med PHP och tyckta att det gick bra och det kändes som att jag hade koll på det mesta. Och det var en bra mjukstart med repetition av sådant som ajg ahr gått igenom innan. Tycker ajg har någorlunda koll på PHP grunderna efter att ha gått igenom den guiden och stötte inte på många svårigheter där.</p>
	
	<p>Jag döpte min webbmall till Glados efter karaktären GLaDOS (Genetic Lifeform and Disk Operating System) från spelet Portal. Jag hade svårt att greppa logiken bakom webbmallen då det var mycket kod som kändes ny uppdelad i många filer, och många nya koncept som jag inte hört talas om tidigare var introducerade. Det var svårt att greppa på en gång då det krävdes att alla filerna var skrivna innan det gick att få en överblick över vad det var som hände. Det känns mycket ovant att dela upp kod på det här viset, och hoppas att det ska bli mer naturligt längre in i kursen. Jag gjorde inga ändringar eller förbättringar till webbmallen då jag vill känna att jag förstår det bättre först.</p>
	
	<p>Jag försökte att inkludera source som en modul i webbmallen men det tog ett bra tag innan jag fick med stylesheetet också. Tror det beror mest på att jag är ovan i hur jag ska hitta runt i Anax och de var lätt att missa kod då det inte kändes helt naturligt var ajg skulle leta någonstans. Fick rätt på det till slut i alla fall.</p>
	
	<p>Jag gillade extrauppgiften med git då jag hört om det tidigare och tittat en del på det men aldrig helt förstått hur det är tänkt att man ska arbeta med det. Guiden här var lätt att följa och jag hoppas kunna använda git mer i framtiden.</p>
</article>

EOD;


// Leave it to the rendering part of Glados
include(GLADOS_THEME_PATH);
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
	
	<h2>Kursmoment 2: Objektorienterad programmering i PHP</h2>
	
	<p>Jag har inte mycket tidigare kunskaper om objektorienterad programmering. Jag vet om att det finns och att det är populärt. Har även försökt att lära mig det ett antal gånger men aldrig lyckats riktigt greppa hur det går till och hur man ska organisera koden på rätt sätt, eller varför det är så användbart.</p>
	
	<p>Jag gillade skarpt guiden Kom igång med objektiorienterad PHP programmering. Tyckte att det var lätt att hänga med i guiden och det klargjorde saker som jag tidigare inte greppat med objektorienterad programmering. Jag ser nu hur otroligt användbart det är och hur mycket tid det kan sparar när man slipper att skriva om koden igen och igen.</p>
	
	<p>Eftersom att objektorienterad programmering är ett koncept som jag länge har haft svårt att greppa så jobbade jag igenom hela guiden och tyckte att den hade många mycket bra exempel. Har innan fått objektorienterad programmering förklarat med hjälp av exempel var långt iväg från någon verklighetsförankring och gjorde att jag bara förstod iden konceptuellt men inte praktiskt hur det skulle användas. Därför gillade att den här guiden använde tärningsspelet som exempel.</p>
	
	<p>När det väl kom till att skapa spelet för webbmallen så blev det krångligare. Var först ganska handfallen då jag sen kursmoment 1 fortfarande kände mig väldigt osäker på hur webbmallen fungerade egentligen och visste inte först hur jag skulle bära mig åt för att integrera spelet i mallen. Det fanns inte heller några anvisningar eller ledtrådar om hur i det här momentet, men jag antar att det beror på att anvisningarna till hur man lade in en modul i Anax fanns i förra kursmomentet.</p>
	
	<p>Jag provade mig fram så smått och tittade på exemplen från de övriga sidorna vi har skapat i mallen och genom att titta på CSource som är den klassen vi har inlagd sedan tidigare. Trodde jag hade fått rätt på det då men fick det fortfarande inte att fungera då jag fick felmeddelande att min klasser inte hade hämtats in i programet ordentligt. Trodde då att jag hade gjort något fel i config eller bootsrap filen men när jag tittade på det såg allt rätt ut.</p>
	
	<p>Efter ett tag fick jag spelet att fungera men den totala poängen för varje runda räknades aldrig och var bara samma som den för senaste kastet hela tiden. Fattade inte varför då det jag inte hittade något fel i funktionerna i min klass. Gissade då att det måste vara något fel med sessionen som gjorde att poängen inte sparades ordentligt. Efter många om och men hittade jag att felet var i min config fil där jag startade sessionen innan jag hämtade in bootsrap filen. Ändrade placeringen och då fungerade spelet utmärkt sen.</p>
	
	<p>Koden i tärningsspelet är för det mesta samma som från guiden. Det beror på att det tog så pass lång tid för mig att få rätt på sessionerna. När jag väl fått ordning på det så ändrade jag i GetTotal funktionen och GetRoundTotal funktionen för att kolla om en etta hade slagits respektive om den totala poängen var 100 eller mer.</p>
	
<h2>Kursmoment 3: SQL och Databasen MySQL</h2>
	
	<p>Jag har inte mycket tidigare erfarenhet av Databser så det var mycket nytt för mig i det här kursmomentet. Min enda tidigare erfarenhet av det var kursen HTMLPHP där vi använde databasen SQLite. Jag har WAMP server installerad sedan tidigare så har tittat lite på PHPMyAdmin tidigare men inte använt det.</p>
	
	<p>Jag använde Putty i det här momentet för att gå igenom guiden Kom igång med SQL. Tyckte att det kändes bra, då jag har jobbat lite med command lines innan. Att jobba med databsen var svårare än jag trodde att det skulle vara och kändes inte så naturligt. Många av frågesatserna var svåra att förstå och manuaeln var mycket svårläst den med. Trots att den var svårläst var den dock den bästa källan till information då jag jämförde med den informaiton jag hittade genom vanliga google sökningar. Det finns så många olika frågekombinationer att det verkar kunna bli hur inveklat som helst.</p>
	
	<p>Alias och Views var behändiga och gjorde databasen lite mer lätthanterlig, men ju mer invecklad en frågeställning är ju svårare var det för mig att hänga med i logiken. Tyckte det svåraste var att veta i vilken ordning frågorna kommer, känns ibland som att SQL språket är lite baklänges.</p>
	
	<p>Svårighetsgraden på Giuden var OK i början tyckte jag. Sedan blev det klart svårare allt eftersom och på slutet var det mycket förvirring, speciellt med att binda samman information från olika tabeller med INNER och OUTER JOIN. Hade uppskattat om det facit på rätt frågeställning att använda hade funnits med lite oftare.</p>
	
	<p>Återigen så hoppas jag att det här med databaser kommer att kännas mer naturligt längre fram när vi har jobbat mer med det, men just nu är det mycket att ta in. Tror filen med sparad kod från guiden kommer att mycket nyttig att när jag jobbar med databaser i framtiden.</p>
	
</article>

EOD;


// Leave it to the rendering part of Glados
include(GLADOS_THEME_PATH);
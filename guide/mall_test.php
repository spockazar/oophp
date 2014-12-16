<?php
error_reporting(-1);   //Reports all types of errors
ini_set('display_errors', 1); //Display all errors
ini_set('output_buffering', 0); //Do not buffer outputs, write directly
?>

<!doctype html>
<html lang="sv">

<head>
	<meta charset="utf-8">
	<title>php20</title>
</head>

<body>

	<h1>Mallsida i HTML</h1>
	<?php echo "<p>Hello World!</p>"; ?>
    <h4>ROT13:</h4>
    <?php
	 $encoded = str_rot13("Hello");
     echo $encoded;
	 $decoded = str_rot13($encoded);
	 echo "\n" . $decoded;
	 ?>
     <p>ROT13 encoding shifts every letter by 13 places in the alphabet while leaving non-alphabetic characters untouched</p>
     <h4>MD5 Hash:</h4>
     <?php
	 $hash = md5("Hello");
	 $hash_again = md5($hash);
	 echo "<p>$hash</p>";
	 echo "<p>$hash_again</p>";
	 ?>
     <p>
     The algorithm takes as input a message of arbitrary length and produces
   as output a 128-bit "fingerprint" or "message digest" of the input.
   It is conjectured that it is computationally infeasible to produce
   two messages having the same message digest, or to produce any
   message having a given prespecified target message digest. The MD5
   algorithm is intended for digital signature applications, where a
   large file must be "compressed" in a secure manner before being
   encrypted with a private (secret) key under a public-key cryptosystem
   such as RSA.</p>
   
   <?php
	echo "<p>Constant __DIR__ (available from PHP 5.3) is: " . __DIR__ . "</p>";
	echo "<p>Constant __FILE__ is: " . __FILE__ . "</p>";
	echo "<p>Filename-part of __FILE__ is: " . basename(__FILE__) . "</p>";
	echo "<p>Directory-part of __FILE__ is: " . dirname(__FILE__) . "</p>";
   ?>
   
   <?php
   	$tal = 10;
	echo "<p>" . $tal++ . "</p>";
	echo "<p>$tal</p>";
	
	$tal = 10;
	echo "<p>" . ++$tal . "</p>";
	echo "<p>$tal</p>";
   ?>
	<hr>
	<a href=				"http://validator.w3.org/unicorn/check?ucn_uri=refere	r&amp;ucn_task=conformance">Unicorn</a>
	<a href="source.php">Källkod</a>

</body>
</html>
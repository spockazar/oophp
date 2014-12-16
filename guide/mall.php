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
	<hr>
	<a href=				"http://validator.w3.org/unicorn/check?ucn_uri=refere	r&amp;ucn_task=conformance">Unicorn</a>
	<a href="source.php">Källkod</a>

</body>
</html>
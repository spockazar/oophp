<?php
// Include the class definition
include("simple_class.php");

// Create an instance of the class
$obj = new SimpleClass();

// Use the class
echo '<p>';
$obj->DisplayVar();
echo '</p>';


// change the state of the object and use it again
$obj->var = "Hello World (Should be 2) = ";
echo '<p>';
$obj->DisplayVar();
echo '</p>';

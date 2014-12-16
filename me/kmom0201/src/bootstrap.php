<?php
/**
 * Bootstrapping funktioner 
 *
 */
 
/**
 * Default exception handler.
 *
 */
function myExceptionHandler($exception) {
  echo "Glados: Uncaught exception: <p>" . $exception->getMessage() . "</p><pre>" . $exception->getTraceAsString(), "</pre>";
}
set_exception_handler('myExceptionHandler');
 
 
/**
 * Autoloader for classes.
 *
 */
function myAutoloader($class) {
  $path = GLADOS_INSTALL_PATH . "/src/{$class}/{$class}.php";
  if(is_file($path)) {
    include($path);
  }
  else {
    throw new Exception("Classfile '{$class}' does not exists.");
  }
}
spl_autoload_register('myAutoloader');



/**
 * Dump all contents of a variabel.
 *
 */
function dump($a) {
  echo '<pre>' . print_r($a, 1) . '</pre>';
}


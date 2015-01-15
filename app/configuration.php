<?php
/*
|--------------------------------------------------------------------------
| Configuration
|--------------------------------------------------------------------------
| This is where all the configuration is retrieved and set
|
*/

// Set the display errors and reporting levels
ini_set('display_errors', 1);
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Set the timezone
date_default_timezone_set('America/Los_Angeles');

// The default configuration
$defaultConfig = array(
  'templates.path' => __DIR__.'/templates',
  'debug' => false
);

// Merge the defaults with the enviroment settings
return array_merge($defaultConfig, require __DIR__.'/../.env.php');
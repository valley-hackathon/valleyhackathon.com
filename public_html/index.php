<?php

/*
|--------------------------------------------------------------------------
| >> START HERE! <<
|--------------------------------------------------------------------------
| This is where the application starts,
| First of all, set some error handling stuff, and general app config
|
*/

// Set the display errors and reporting levels
ini_set('display_errors', 1);
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Set the timezone
date_default_timezone_set('America/Los_Angeles');

// Require composer dependencies
require '../vendor/autoload.php';

// Define app wide configuration
define('RECAPTCHAPUBLIC', '6LcNJeESAAAAACRIIHVmpwsBv_NRQmZsUaSmjqKh');
define('RECAPTCHAPRIVATE', '6LcNJeESAAAAACcLAn0pJPF0isoI-i0e1unhg4m_');

/*
|--------------------------------
| Let's get this thing in gear and going
*/

// Instantiate the app
$app = require_once __DIR__.'/../app/start.php';

// AAAND run it!!!
$app->run();
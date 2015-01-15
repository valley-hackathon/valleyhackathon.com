<?php

/*
|--------------------------------------------------------------------------
| >> START HERE! <<
|--------------------------------------------------------------------------
| This is where the application starts,
| Let's get this thing in gear and going
|
*/

// Require composer dependencies
require __DIR__.'/../vendor/autoload.php';

// Instantiate the app
$app = require_once __DIR__.'/../app/start.php';

// AAAND run it!!!
$app->run();
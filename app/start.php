<?php

/*
|--------------------------------------------------------------------------
| Start the Application
|--------------------------------------------------------------------------
| This creates a new app instance,
| loads up the middleware, includes the routes,
| and returns the app instance so it can be run
|
*/

// Create the app and load the configuration
$app = new \Slim\Slim(require __DIR__.'/configuration.php');

// Add the session middleware
$app->add(new \Slim\Middleware\SessionCookie(array(
    'expires' => '60 minutes',
    'path' => '/',
    'domain' => null,
    'secure' => false,
    'httponly' => false,
    'name' => 'valleyhackathon_session',
    'secret' => 'DSAG678%^&ghjo5t&8',
    'cipher' => MCRYPT_RIJNDAEL_256,
    'cipher_mode' => MCRYPT_MODE_CBC
)));

// Add the view engine (Twig)
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
  'charset'          => 'utf-8',
  'cache'            => realpath('/templates/cache'),
  'auto_reload'      => true,
  'strict_variables' => false,
  'autoescape'       => true
);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());

// All the templating data will be passed into here
global $data;

// Load the data files
require __DIR__.'/data/judges.php';
require __DIR__.'/data/sponsors.php';
require __DIR__.'/data/teams.php';

// Get the current git hash
// This is so the git hash can be put at the bottom of the page
//    in comments so that it's easier to debug
$slicedDirectory = array_slice(explode('/', __DIR__), -2, 1);
$data['current_hash'] = $slicedDirectory[0];

// Pass the current URL
$data['currentUrl'] = $app->request()->getPath();

// Load the routes
require_once __DIR__.'/routes.php';

// And finally, return the app
return $app;
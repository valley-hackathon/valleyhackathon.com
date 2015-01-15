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

// Load the database
$app->container->singleton('db', function() use ($app) {
  $database = r\connect($app->config('RETHINK_HOST'));
  $database->useDb($app->config('RETHINK_DATABASE'));
  return $database;
});

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

// Load the data files into the view
$app->view->setData(array('judges' => require __DIR__.'/data/judges.php'));
$app->view->setData(array('teams' => require __DIR__.'/data/teams.php'));
$app->view->setData(require __DIR__.'/data/sponsors.php');

// Get the current git hash
// This is so the git hash can be put at the bottom of the page
//    in comments so that it's easier to debug
$slicedDirectory = array_slice(explode('/', __DIR__), -2, 1);
$app->view->setData('current_hash', $slicedDirectory[0]);

// Pass the current URL
$app->view->setData('currentUrl', $app->request()->getPath());

// Load the routes
require_once __DIR__.'/routes.php';

// And finally, return the app
return $app;
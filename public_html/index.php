<?php

// Set the display errors and reporting levels
ini_set('display_errors', 1);
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Require composer dependencies
require '../vendor/autoload.php';

// Prepare app
$app = new \Slim\Slim(array(
  'templates.path' => '../templates',
  'debug'          => true
));

// Create monolog logger and store logger in container as singleton
// (Singleton resources retrieve the same log resource definition each time)
// Prepare view
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
  'charset'          => 'utf-8',
  'cache'            => realpath('../templates/cache'),
  'auto_reload'      => true,
  'strict_variables' => false,
  'autoescape'       => true
);

/**
 * Judges
 */
$data['judges'][] = array(
  'Name'    => 'Scott Smith',
  'Bio'     => 'VP of Product Development at Front Porch, full stack .NET developer by day and Node developer by night.',
  'picture' => 'ScottSmith.jpg'
);

/**
 * Sponsors
 */
$data['sponsors'][] = array(
  'Level'       => 'Founding Sponsor',
  'Name'        => 'GeoStrategies',
  'URL'         => 'GeoStrategies.com',
  'Logo'        => 'geostrategies.png',
  'Description' => 'Tactical Strategies. Actionable Intelligence.',
  'Text'        => 'GeoStrategies is the founding sponsor. They are giving us food and a place to hold the contest. Without them there would be no contest. These guys are awesome!'
);
$data['sponsors'][] = array(
  'Level'       => 'Platinum Sponsor',
  'Name'        => 'ClearWave',
  'URL'         => 'clearwavesoftware.com',
  'Logo'        => 'clearwave.png',
  'Description' => 'We\'re not your ordinary software company.',
  'Text'        => 'The guys over at Clearwave Software jumped up and offered to sponsor the event without being asked. These guys deserve some serious geek cred for that!'
);
$data['sponsors'][] = array(
  'Level'       => 'Gold Sponsor',
  'Name'        => 'Tuolumne County Innovation Lab',
  'URL'         => 'www.myinnovationlab.org',
  'Logo'        => 'innovationlab.png',
  'Description' => 'Local Maker Space!',
  'Text'        => 'The InnovationLab is a membership-based facility. It includes a do-it-yourself fabrication and prototyping center,
  a maker space, and a learning center. And it is in Sonora. Woot!'
);
$data['sponsors'][] = array(
  'Level'       => 'Gold Sponsor',
  'Name'        => 'Inventaweb',
  'URL'         => 'inventaweb.net',
  'Logo'        => 'inventaweb.png',
  'Description' => 'Inventing your next website.',
  'Text'        => 'Inventaweb is building this nifty website for the event. Keep looking back here for more information and after the event for links to several of the projects!'
);
$data['sponsors'][] = array(
  'Level'       => 'Silver Sponsor',
  'Name'        => 'Front Porch',
  'URL'         => 'frontporch.com',
  'Logo'        => 'frontporch.png',
  'Description' => 'Subscriber Communication Solution for Service Providers',
  'Text'        => 'We are stoked about having these guys as a sponsor, and even more so about having Scott Smith as a judge!'
);
$data['sponsors'][] = array(
  'Level' => 'Bronze Sponsor',
  'Name' => 'DataBoost',
  'URL' => 'databoost.com',
  'Logo' => 'databoost.png',
  'Description' => 'Data Marketing Application Development and Hosting Solutions.',
  'Text' => 'These guys are going to be providing breakfast,
  we love breakfast therefore we love them. :-)'
);
$data['sponsors'][] = array(
  'Level'       => 'Bronze Sponsor',
  'Name'        => 'Associated Feed',
  'URL'         => 'associatedfeed.com',
  'Logo'        => 'associated.png',
  'Description' => 'Delivering the best feed products for your animals.',
  'Text'        => 'Not just your average feed mill. This place is a serious technology incubator.'
);

/**
 * Sponsorship tiers
 */
$data['sponsorship'][] = array(
 'Name'         => 'Bronze',
 'Commitment'   => '$250',
 'Judges'       => 'One',
 'Access'       => 'Friday 5pm-8pm,
 Saturday 5pm to end',
 'Surprize'     => '',
 'Introduction' => 'brief'
);
$data['sponsorship'][] = array(
 'Name'         => 'Silver',
 'Commitment'   => '$500<br>-or-<br>$250 + prizes worth over $250',
 'Judges'       => 'One',
 'Access'       => 'Friday 5pm-8pm,
 Saturday 5pm to end',
 'Surprize'     => '',
 'Introduction' => '30 seconds'
);
$data['sponsorship'][] = array(
 'Name'         => 'Gold',
 'Commitment'   => '$1000<br>-or-<br>$500 + prizes worth over $500',
 'Judges'       => 'One',
 'Access'       => 'Entire Event',
 'Surprize'     => '',
 'Introduction' => 'up to one minute'
);
$data['sponsorship'][] = array(
 'Name'         => 'Platinum',
 'Commitment'   => '$1000 + prizes worth over $1000',
 'Judges'       => 'One or Two',
 'Access'       => 'Entire Event',
 'Surprize'     => 'Sponsor a surprise that will cause joy and admiration among the contestants.',
 'Introduction' => 'up to one minute'
);

/**
 * Teams
 */
$data['teams'][] = array(
  'Name'       => 'Project Stormageddon',
  'Frameworks' => 'Angular.js / Slim Framework / Swift',
  'Members'    => 'Matthew Davies<br>Nic Hector<br>Nathan Bunney',
  'County'     => 'Stanislaus<br>Calaveras'
);
$data['teams'][] = array(
  'Name'       => 'Team 2',
  'Frameworks' => 'Angular.js / Node.js / Koa.js',
  'Members'    => 'James Moore<br>Joshua Chamberlain<br>Bruce Freeby',
  'County'     => 'Stanislaus'
);
$data['teams'][] = array(
  'Name'       => 'Guinea Pigs',
  'Frameworks' => '',
  'Members'    => 'Ed Taylor<br>Shane Powser<br>Cameron Jordan',
  'County'     => 'Tuolumne'
);
$data['teams'][] = array(
  'Name'       => 'Team 4',
  'Frameworks' => '',
  'Members'    => 'Mat Wood<br>Brian Blocher<br>James Williams',
  'County'     => 'Tuolumne'
);

// Get the current git hash
$data['current_hash'] = array_slice(explode('/', __DIR__), -2, 1)[0];

$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());

/**
 * Routes
 */
$app->get('/', function () use ($app) {
  global $data;
  $data['title']       = 'Valley Hackathon';
  $data['description'] = 'The Valley Hackathon is a locals only hackathon designed to show local employers that there are high quality programmers right here in the Central Valley of California.';
  $data['h1']          = 'Turlock Hackathon';
  $app->render('index.html', $data);
});

$app->get('/about', function () use ($app) {
  global $data;
  $data['title']       = 'About Valley Hackathon';
  $data['description'] = 'Find out more details about the Valley Hackathon';
  $data['h1']          = 'About the Valley Hackathon';
  $app->render('about.html', $data);
});

$app->get('/sponsors', function () use ($app) {
  global $data;
  $data['title']       = 'Sponsors of Valley Hackathon';
  $data['description'] = 'Sponsors of Valley Hackathon are all local companies involved in technology in one way or another.';
  $data['h1']          = 'Aponsors of the Valley Hackathon';
  $app->render('sponsors.html', $data);
});

$app->get('/signup', function () use ($app) {
  global $data;
  $data['title']       = 'Signup for Valley Hackathon';
  $data['description'] = 'Signup for the Valley Hackathon ';
  $data['h1']          = 'Signup for the Event';
  $app->render('signup.html', $data);
});

$app->get('/speed-test', function () use ($app) {
});

// Run app
$app->run();
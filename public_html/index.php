<?php

// Set the display errors and reporting levels
ini_set('display_errors', 1);
error_reporting(E_ERROR | E_WARNING | E_PARSE);

date_default_timezone_set('America/Los_Angeles');

// Require composer dependencies
require '../vendor/autoload.php';
use Mailgun\Mailgun;
use ReCaptcha\Captcha;
use ReCaptcha\CaptchaException;

define('RECAPTCHAPUBLIC', '6LcNJeESAAAAACRIIHVmpwsBv_NRQmZsUaSmjqKh');
define('RECAPTCHAPRIVATE', '6LcNJeESAAAAACcLAn0pJPF0isoI-i0e1unhg4m_');

// Prepare app
$app = new \Slim\Slim(array(
  'templates.path' => '../templates',
  'debug'          => true
));

$app->add(new \Slim\Middleware\SessionCookie(array(
    'expires' => '60 minutes',
    'path' => '/',
    'domain' => null,
    'secure' => false,
    'httponly' => false,
    'name' => 'slim_session',
    'secret' => 'DSAG678%^&ghjo5t&8',
    'cipher' => MCRYPT_RIJNDAEL_256,
    'cipher_mode' => MCRYPT_MODE_CBC
)));

// Create the view engine with Twig
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
  'Level'       => 'Bronze Sponsor',
  'Name'        => 'DataBoost',
  'URL'         => 'databoost.com',
  'Logo'        => 'databoost.png',
  'Description' => 'Data Marketing Application Development and Hosting Solutions.',
  'Text'        => 'These guys are going to be providing breakfast,
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
  'Frameworks' => 'Angular.js / Node.js / Koa.js / Swift',
  'Members'    => 'Matthew Davies<br>Nathan Bunney<br>Robert Huffman',
  'County'     => 'Stanislaus'
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
$data['teams'][] = array(
  'Name'       => 'Team 5',
  'Frameworks' => 'React/Node.js',
  'Members'    => 'Bryan Garza<br>Mario Muniz<br>Brett Martin<br>Annie Yang',
  'County'     => 'Stanislaus'
);

// Get the current git hash
$slicedDirectory = array_slice(explode('/', __DIR__), -2, 1);
$data['current_hash'] = $slicedDirectory[0];

$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());

// Pass the current URL
$data['currentUrl'] = $app->request()->getPath();

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

	$captcha = new Captcha();

	$captcha->setPublicKey(RECAPTCHAPUBLIC);
	$captcha->setPrivateKey(RECAPTCHAPRIVATE);
	$data['captcha'] = $captcha->displayHTML();

  $app->render('signup.html', $data);
});

$app->post('/register', function () use ($app) {
  global $data;
  $data['title']       = 'Thanks for Registering';
  $data['description'] = 'Thanks for Registering';
  $data['h1']          = 'Thanks for Registering';

	$captcha = new Captcha();

	$captcha->setPublicKey(RECAPTCHAPUBLIC);
	$captcha->setPrivateKey(RECAPTCHAPRIVATE);

  try {
		if ( !$captcha->isValid() ) {
			throw new CaptchaException($captcha->getError());
		}

	} catch (CaptchaException $e) {
  	//echo $e->errorMessage();
  	//die();
    $app->flash('error', 'Incorrect Captcha, Please Try Again.');
    $app->flash('formData', $_POST);
    $app->redirect('/signup');
	}

  $mailData=$_POST;
/*
  foreach($mailData as $i=>$p){
    $mailData[$i] = mysql_real_escape_string($p);
  }
*/

  $view = $app->view();
  $view->setData('data', $mailData);
  $email_content = $view->render('email.html');

  $mg = new Mailgun("key-172019857fe194754e04c77c0f97c847");
  $domain = "valleyhackathon.com";

  $mg->sendMessage($domain, array('from'    => 'team_signup@ValleyHackathon.com',
                                  'to'      => 'geektech2000@gmail.com',
                                  'subject' => 'New Team Signup!',
                                  'html'    => $email_content,
                                  'text'    => strip_tags($email_content)
                                  ));

  $mg->sendMessage($domain, array('from'    => 'team_signup@ValleyHackathon.com',
                                  'to'      => 'ben@geostrategies.com',
                                  'subject' => 'New Team Signup!',
                                  'html'    => $email_content,
                                  'text'    => strip_tags($email_content)
                                  ));


  $app->render('register.html', $data);
});

$app->get('/speed-test', function () use ($app) {
});

$app->get('/flier', function () use($app) {
    $log = '/home/valleyh/files/ValleyHackathonFlier.pdf';
    $res = $app->response();
    $res['Content-Description'] = 'File Transfer';
    $res['Content-Type'] = 'application/pdf';
    $res['Content-Disposition'] ='attachment; filename=' . basename($log);
    $res['Content-Transfer-Encoding'] = 'binary';
    $res['Expires'] = '0';
    $res['Cache-Control'] = 'must-revalidate';
    $res['Pragma'] = 'public';
    $res['Content-Length'] = filesize($log);
    readfile($log);
});


// Run app
$app->run();
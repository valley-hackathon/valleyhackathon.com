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

require_once('./data.php');

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
  $data['h1']          = 'Sponsors of the Valley Hackathon';
  $app->render('sponsors.html', $data);
});

$app->get('/judges', function () use ($app) {
  global $data;
  $data['title']       = 'Judges of Valley Hackathon';
  $data['description'] = 'Judges of Valley Hackathon are an eclectic group of technologists, business leaders, and design experts.';
  $data['h1']          = 'Judges of the Valley Hackathon';
  $app->render('judges.html', $data);
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

$app->get('/teams', function () use ($app) {
  global $data;
  $data['title']       = 'Valley Hackathon Teams';
  $data['description'] = 'Check out the current teams for the Valley Hackathon';
  $data['h1']          = 'Current Teams';
  $app->render('teams.html', $data);
});

$app->get('/prizes', function () use ($app) {
  global $data;
  $data['title']       = 'Valley Hackathon Prizes';
  $data['description'] = 'Check out the prizes for the Valley Hackathon';
  $data['h1']          = 'Current Prizes';
  $app->render('prizes.html', $data);
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
    $file = '/home/valleyh/files/ValleyHackathonFlier.pdf';
    $res = $app->response();
    $res['Content-Description'] = 'File Transfer';
    $res['Content-Type'] = 'application/pdf';
    $res['Content-Disposition'] ='attachment; filename=' . basename($file);
    $res['Content-Transfer-Encoding'] = 'binary';
    $res['Expires'] = '0';
    $res['Cache-Control'] = 'must-revalidate';
    $res['Pragma'] = 'public';
    $res['Content-Length'] = filesize($file);
    readfile($file);
});


// Run app
$app->run();
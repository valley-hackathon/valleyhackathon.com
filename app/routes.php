<?php

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
| This is where all the routes are defined,
| but no code actually runs (definition code only)
|
*/

use Mailgun\Mailgun;
use ReCaptcha\Captcha;
use ReCaptcha\CaptchaException;

$app->view->setData(['hackathon', 'hack day', 'valley hackathon', 'Central Valley', 'Central Valley Hackathon']);

$app->get('/', function () use ($app) {
  $app->view->setData(array(
    'title'       => 'Valley Hackathon',
    'description' => 'The Valley Hackathon is a locals only hackathon designed to show local employers that there are high quality programmers right here in the Central Valley of California.',
    'h1'          => 'Turlock Hackathon'
  ));
  $app->render('index.html');
});

$app->get('/about', function () use ($app) {
  $app->view->setData(array(
    'title'       => 'About Valley Hackathon',
    'description' => 'Find out more details about the Valley Hackathon',
    'keywords'    => ['About hackathon', 'About Valley Hackathon', 'About Central Valley hackathon'],
    'h1'          => 'About the Valley Hackathon'
  ));
  $app->render('about.html');
});

$app->get('/sponsors', function () use ($app) {
  $app->view->setData(array(
    'title'       => 'Sponsors of Valley Hackathon',
    'description' => 'Sponsors of Valley Hackathon are all local companies involved in technology in one way or another.',
    'keywords'    => ['Hackathon sponsors', 'Valley Hackathon sponsors', 'Central Valley hackathon sponsors'],
    'h1'          => 'Sponsors of the Valley Hackathon'
  ));
  $app->render('sponsors.html');
});

$app->get('/judges', function () use ($app) {
  $app->view->setData(array(
    'title'       => 'Judges of Valley Hackathon',
    'description' => 'Judges of Valley Hackathon are an eclectic group of technologists, business leaders, and design experts.',
    'keywords'    => ['Hackathon judges', 'Valley Hackathon judges', 'Central Valley hackathon judges'],
    'h1'          => 'Judges of the Valley Hackathon'
  ));
  $app->render('judges.html');
});

$app->get('/signup', function () use ($app) {
  $app->view->setData(array(
    'title'       => 'Signup for Valley Hackathon',
    'description' => 'Signup for the Valley Hackathon',
    'keywords'    => ['Hackathon signup', 'Valley Hackathon signup', 'Central Valley hackathon signup'],
    'h1'          => 'Signup for the Event'
  ));

  $captcha = new Captcha();

  $captcha->setPublicKey($app->config('RECAPTCHAPUBLIC'));
  $captcha->setPrivateKey($app->config('RECAPTCHAPRIVATE'));

  $app->view->setData('captcha', $captcha->displayHTML());

  $app->render('signup.html');
});

$app->get('/teams', function () use ($app) {
  $app->view->setData(array(
    'title'       => 'Valley Hackathon Teams',
    'description' => 'Check out the current teams for the Valley Hackathon',
    'keywords'    => ['Hackathon teams', 'Valley Hackathon teams', 'Central Valley hackathon teams'],
    'h1'          => 'Current Teams'
  ));
  $app->render('teams.html');
});

$app->get('/prizes', function () use ($app) {
  $app->view->setData(array(
    'title'       => 'Valley Hackathon Prizes',
    'description' => 'Check out the prizes for the Valley Hackathon',
    'keywords'    => ['Hackathon prizes', 'Valley Hackathon prizes', 'Central Valley hackathon prizes'],
    'h1'          => 'Current Prizes'
  ));
  $app->render('prizes.html');
});

$app->post('/register', function () use ($app) {
  $app->view->setData(array(
    'title'       => 'Thanks for Registering',
    'description' => 'Thanks for Registering',
    'h1'          => 'Thanks for Registering'
  ));

  $captcha = new Captcha();

  $captcha->setPublicKey($app->config('RECAPTCHAPUBLIC'));
  $captcha->setPrivateKey($app->config('RECAPTCHAPRIVATE'));

  try {
    if ( !$captcha->isValid() ) {
      throw new CaptchaException($captcha->getError());
    }
  } catch (CaptchaException $e) {
    $app->flash('error', 'Incorrect Captcha, Please Try Again.');
    $app->flash('formData', $_POST);
    $app->redirect('/signup');
  }

  $mailData = $_POST;

  $view = $app->view();
  $view->setData('data', $mailData);
  $email_content = $view->render('email.html');

  $mailgun = new Mailgun($app->config('MAILGUN_KEY'));

  $mailgun->sendMessage(
    $app->config('MAILGUN_DOMAIN'),
    array(
      'from' => 'team_signup@ValleyHackathon.com',
      'to'      => ['daviesgeek@gmail.com', 'matthew@geostrategies.com'],
      'subject' => 'New Team Signup!',
      'html'    => $email_content,
      'text'    => strip_tags($email_content)
  ));
  $app->render('register.html');
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
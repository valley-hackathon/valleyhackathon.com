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

View::setData(['hackathon', 'hack day', 'valley hackathon', 'Central Valley', 'Central Valley Hackathon']);

App::get('/', function () use($app) {
  View::setData(array(
    'title'       => 'Valley Hackathon',
    'description' => 'The Valley Hackathon is a locals only hackathon designed to show local employers that there are high quality programmers right here in the Central Valley of California.',
    'h1'          => 'Turlock Hackathon'
  ));
  $app->render('index.html');
});

App::get('/minihack', function () use($app) {
  View::setData(array(
    'title'       => 'About Valley Hackathon - Mini-Hack taking place in Modesto, CA in June 2015',
    'description' => 'Find out more details about the Valley Hackathon Mini-Hack',
    'keywords'    => ['About hackathon', 'About Valley Hackathon', 'About Central Valley hackathon'],
    'h1'          => 'About the Valley Hackathon Mini-Hack'
  ));
  $app->render('minihack.html');
});

App::get('/about', function () use($app) {
  View::setData(array(
    'title'       => 'About Valley Hackathon',
    'description' => 'Find out more details about the Valley Hackathon',
    'keywords'    => ['About hackathon', 'About Valley Hackathon', 'About Central Valley hackathon'],
    'h1'          => 'About the Valley Hackathon'
  ));
  $app->render('about.html');
});

App::get('/sponsors', function () use($app) {
  View::setData(array(
    'title'       => 'Sponsors of Valley Hackathon',
    'description' => 'Sponsors of Valley Hackathon are all local companies involved in technology in one way or another.',
    'keywords'    => ['Hackathon sponsors', 'Valley Hackathon sponsors', 'Central Valley hackathon sponsors'],
    'h1'          => 'Sponsors of the Valley Hackathon'
  ));
  $app->render('sponsors.html');
});

App::get('/sponsors/2015', function () use($app) {
  View::setData(array(
    'title'       => 'Sponsors of 2015 Valley Hackathon',
    'description' => 'Sponsors of 2015 Valley Hackathon are all local companies involved in technology in one way or another.',
    'keywords'    => ['Hackathon sponsors', 'Valley Hackathon 2015 sponsors', 'Central Valley hackathon sponsors'],
    'h1'          => 'Sponsors of the 2015 Valley Hackathon'
  ));
  $app->render('sponsors2015.html');
});

App::get('/judges', function () use($app) {
  View::setData(array(
    'title'       => 'Judges of Valley Hackathon',
    'description' => 'Judges of Valley Hackathon are an eclectic group of technologists, business leaders, and design experts.',
    'keywords'    => ['Hackathon judges', 'Valley Hackathon judges', 'Central Valley hackathon judges'],
    'h1'          => 'Judges of the Valley Hackathon'
  ));
  $app->render('judges.html');
});

App::get('/judges/2015', function () use($app) {
  View::setData(array(
    'title'       => 'Judges of 2015 Valley Hackathon',
    'description' => 'Judges of 2015 Valley Hackathon are an eclectic group of technologists, business leaders, and design experts.',
    'keywords'    => ['Hackathon judges 2015', 'Valley Hackathon judges', 'Central Valley hackathon judges'],
    'h1'          => 'Judges of the 2015 Valley Hackathon'
  ));
  $app->render('judges2015.html');
});

App::get('/signup', function () use($app) {
  View::setData(array(
    'title'       => 'Signup for Valley Hackathon',
    'description' => 'Signup for the Valley Hackathon',
    'keywords'    => ['Hackathon signup', 'Valley Hackathon signup', 'Central Valley hackathon signup'],
    'h1'          => 'Signup for the Event'
  ));

  $captcha = new Captcha();

  $captcha->setPublicKey(Config::get('RECAPTCHAPUBLIC'));
  $captcha->setPrivateKey(Config::get('RECAPTCHAPRIVATE'));

  View::setData('captcha', $captcha->displayHTML());

  $app->render('signup.html');
});

App::get('/teams', function () use($app) {
  View::setData(array(
    'title'       => 'Valley Hackathon Teams',
    'description' => 'Check out the current teams for the Valley Hackathon',
    'keywords'    => ['Hackathon teams', 'Valley Hackathon teams', 'Central Valley hackathon teams'],
    'h1'          => 'Current Teams'
  ));
  $app->render('teams.html');
});

App::get('/teams/2015', function () use($app) {
  View::setData(array(
    'title'       => '2015 Valley Hackathon Teams',
    'description' => 'Check out the 2015 teams for the Valley Hackathon',
    'keywords'    => ['2015 Hackathon teams', 'Valley Hackathon teams', 'Central Valley hackathon teams'],
    'h1'          => '2015 Teams'
  ));
  $app->render('teams2015.html');
});

App::get('/prizes', function () use($app) {
  View::setData(array(
    'title'       => 'Valley Hackathon Prizes',
    'description' => 'Check out the prizes for the Valley Hackathon',
    'keywords'    => ['Hackathon prizes', 'Valley Hackathon prizes', 'Central Valley hackathon prizes'],
    'h1'          => 'Current Prizes'
  ));
  $app->render('prizes.html');
});

App::get('/prizes/2015', function () use($app) {
  View::setData(array(
    'title'       => '2015 Valley Hackathon Prizes',
    'description' => 'Check out the prizes for the 2015 Valley Hackathon',
    'keywords'    => ['Hackathon prizes', 'Valley Hackathon prizes 2015', 'Central Valley hackathon prizes'],
    'h1'          => '2015 Prizes'
  ));
  $app->render('prizes2015.html');
});

$app->post('/register', function () use($app) {
  View::setData(array(
    'title'       => 'Thanks for Registering',
    'description' => 'Thanks for Registering',
    'h1'          => 'Thanks for Registering'
  ));

  $captcha = new Captcha();

  $captcha->setPublicKey(Config::get('RECAPTCHAPUBLIC'));
  $captcha->setPrivateKey(Config::get('RECAPTCHAPRIVATE'));

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

  $mailgun = new Mailgun(Config::get('MAILGUN_KEY'));

  $mailgun->sendMessage(
    Config::get('MAILGUN_DOMAIN'),
    array(
      'from' => 'team_signup@ValleyHackathon.com',
      'to'      => ['geektech2000@gmail.com', 'ben@geostrategies.com'],
      'subject' => 'New Team Signup!',
      'html'    => $email_content,
      'text'    => strip_tags($email_content)
  ));
  $app->render('register.html');
});

App::get('/speed-test', function () use($app) {
});

App::get('/flier', function () use($app) {
    $file = '/home/valleyh/files/ValleyHackathonFlier.pdf';
    $res = App::response();
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
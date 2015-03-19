<?php

/**
 * Teams
 */
$teams[] = array(
  'Name'       => 'SendSmart',
  'Frameworks' => 'Angular.js / Node.js / Koa.js / RethinkDB',
  'Members'    => 'James Moore<br>Joshua Chamberlain<br>Bruce Freeby',
  'County'     => 'Stanislaus',
  'Description'=> 'SendSmart is an an app to send email campaigns via Amazon SES. It\'s distinctive feature was the ability to tag links in the email body such that a click event would automatically associate the recipient with the given tag(s). Future campaigns could then be targeted to subscribers whose previous link clicks had confirmed their interest in certain subjects. In short, subscribers would auto-segment themselves by their click patterns.',
  'Place'      => 'First',
  'ReThinkDB'  => true,
  'Present'    => true
);
$teams[] = array(
  'Name'       => 'Kinect-a-Corn',
  'Frameworks' => 'Java, Python, PHP',
  'Members'    => 'Brandon Halpin<br>Bryan Potts<br>Michael Schilber<br>Eric Greenberg',
  'County'     => 'Stanislaus',
  'Description'=> 'The KinectaCorn project used the OpenNI and NITE libraries (Java) to detect user gestures with a Microsoft Kinect. The gestures were used as triggers and were mapped to different audio sequences and patches created using the ChucK music programming language.  http://chuck.cs.princeton.edu/',
  'Place'      => 'Second',
  'Video'      => 'https://www.youtube.com/watch?v=hEZKV2T3Es0',
  'Present'    => true
);
$teams[] = array(
  'Name'       => 'Train Tracker',
  'Frameworks' => 'Angular.js / Slim Framework / RethinkDB',
  'Members'    => 'Matthew Davies<br>Nathan Bunney<br>Robert Huffman<br>Jared Hill',
  'County'     => 'Stanislaus',
  'Description'=> 'A business oriented training system designed to allow users to track who was trained on what requirements.  A cool implemented feature is that quiz questions can be tied to sections of a video to be replayed if the user misses a question.',
  'Place'      => 'Third',
  'LiveSite'   => 'http://traintrack.software/',
  'Repo'       => 'https://github.com/train-tracker',
  'ReThinkDB'  => true,
  'Present'    => true
);
$teams[] = array(
  'Name'       => 'Politisway',
  'Members'    => '',
  'County'     => 'Fresno',
  'Description'=> '',
  'Present'    => true
);
$teams[] = array(
  'Name'       => 'Gift Tracker',
  'Frameworks' => 'NodeJS / ReactJs / Semantic UI / RethinkDB',
  'Members'    => 'Ed Taylor<br>Shane Powser<br>Cameron Jordan',
  'County'     => 'Tuolumne',
  'ReThinkDB'  => true,
  'Video'      => 'https://www.youtube.com/watch?v=Zb1AVuw-Ygk',
  'Present'    => true
);
$teams[] = array(
  'Name'       => 'MapMe.Rocks',
  'Frameworks' => '',
  'Members'    => 'Mat Wood<br>James Williams<br>Brandon Risell',
  'County'     => 'Tuolumne',
  'Video'      => 'https://www.youtube.com/watch?v=ltHGxjX9J2E',
  'Present'    => true
);
$teams[] = array(
  'Name'       => 'To-Do Local',
  'Frameworks' => 'Java / Android',
  'Members'    => 'Bryan Garza<br>Annie Yang',
  'County'     => 'Stanislaus',
  'Present'    => false
);

return $teams;
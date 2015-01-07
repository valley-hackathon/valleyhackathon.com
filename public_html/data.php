<?php

/**
 * Judges
 */
$data['judges'][] = array(
  'Name'    => 'Carl Schroder',
  'Bio'     => 'President and CEO of GeoStrategies, Carl understands the business side of technology like few in this generation.',
  'picture' => 'CarlSchroder.jpg',
  'sponsorID' => 0
);
$data['judges'][] = array(
  'Name'    => 'Scott Smith',
  'Bio'     => 'VP of Product Development at Front Porch, full stack .NET developer by day and Node developer by night.',
  'picture' => 'ScottSmith.jpg',
  'sponsorID' => 4
);
$data['judges'][] = array(
  'Name'    => 'Rick Swanson',
  'Bio'     => 'Chairman of the Board at Associated Feed and Supply, Rick has been an early adopter of technology his entire life.',
  'picture' => 'RickSwanson.jpg',
  'sponsorID' => 6
);
$data['judges'][] = array(
  'Name'    => 'Erin Priest',
<<<<<<< HEAD
<<<<<<< HEAD
  'Bio'     => 'Web and Graphic Designer at Marcia Herrmann Design, Erin has been doing web design for a lifetime.',
=======
  'Bio'     => 'Web and Graphic Designer at Marcia Herrmann Design, Erin has been doing design for a lifetime.',
>>>>>>> Updates to sponsors and judges pages
=======
  'Bio'     => 'Web and Graphic Designer at Marcia Herrmann Design, Erin has been doing web design for a lifetime.',
>>>>>>> Squashed commit of the following:
  'picture' => 'ErinPriest.jpg',
  'sponsorID' => 7
);
$data['judges'][] = array(
  'Name'    => 'Simeon Franklin',
  'Bio'     => 'Technical Instructor at Twitter, Simeon is the founder of the Modesto Scripting Language Meetup.',
  'picture' => 'SimeonFranklin.jpg',
  'sponsorID' => 9
);
$data['judges'][] = array(
  'Name'    => 'Loyd Schutte',
  'Bio'     => 'Multimedia and IT Director, Interactive Design and Development, Loyd is a web guru.',
  'picture' => 'LoydSchutte.jpg',
  'sponsorID' => 10
);



/**
 * Sponsors
 */
$data['sponsors'][0] = array(
  'Level'       => 'Founding Sponsor',
  'Name'        => 'GeoStrategies',
  'URL'         => 'GeoStrategies.com',
  'Logo'        => 'geostrategies.png',
  'Description' => 'Tactical Strategies. Actionable Intelligence.',
  'Text'        => 'GeoStrategies is the founding sponsor. They are giving us food and a place to hold the contest. Without them there would be no contest. These guys are awesome!'
);
$data['sponsors'][1] = array(
  'Level'       => 'Platinum Sponsor',
  'Name'        => 'RethinkDB',
  'URL'         => 'www.rethinkdb.com',
  'Logo'        => 'RethinkDB.png',
  'Description' => 'An open-source distributed database built with love.',
  'Text'        => 'These guys are amazing and we are thrilled to have the on board.  There is going to be a pre-hackathon event with them so keep your eye on http://www.meetup.com/Modesto-Scripting-Language-Meetup/ for more details.'
);
$data['sponsors'][2] = array(
  'Level'       => 'Gold Sponsor',
  'Name'        => 'Tuolumne County Innovation Lab',
  'URL'         => 'www.myinnovationlab.org',
  'Logo'        => 'innovationlab.png',
  'Description' => 'Local Maker Space!',
  'Text'        => 'The InnovationLab is a membership-based facility. It includes a do-it-yourself fabrication and prototyping center,
  a maker space, and a learning center. And it is in Sonora. Woot!'
);
$data['sponsors'][3] = array(
  'Level'       => 'Gold Sponsor',
  'Name'        => 'Inventaweb',
  'URL'         => 'inventaweb.net',
  'Logo'        => 'inventaweb.png',
  'Description' => 'Inventing your next website.',
  'Text'        => 'Inventaweb is building this nifty website for the event. Keep looking back here for more information and after the event for links to several of the projects!'
);
$data['sponsors'][4] = array(
  'Level'       => 'Silver Sponsor',
  'Name'        => 'Front Porch',
  'URL'         => 'frontporch.com',
  'Logo'        => 'frontporch.png',
  'Description' => 'Subscriber Communication Solution for Service Providers',
  'Text'        => 'We are stoked about having these guys as a sponsor, and even more so about having Scott Smith as a judge!'
);
$data['sponsors'][5] = array(
  'Level'       => 'Bronze Sponsor',
  'Name'        => 'DataBoost',
  'URL'         => 'databoost.com',
  'Logo'        => 'databoost.png',
  'Description' => 'Data Marketing Application Development and Hosting Solutions.',
  'Text'        => 'These guys are going to be providing breakfast,
  we love breakfast therefore we love them. :-)'
);
$data['sponsors'][6] = array(
  'Level'       => 'Bronze Sponsor',
  'Name'        => 'Associated Feed',
  'URL'         => 'associatedfeed.com',
  'Logo'        => 'associated.png',
  'Description' => 'Delivering the best feed products for your animals.',
  'Text'        => 'Not just your average feed mill. This place is a serious technology incubator.'
);
$data['sponsors'][7] = array(
  'Level'       => 'Bronze Sponsor',
  'Name'        => 'Marcia Herrmann Design',
  'URL'         => 'her2man2.com',
  'Logo'        => 'mhd.png',
  'Description' => 'Brand development, graphic design, and website and database design for the Central Valley and beyond.',
  'Text'        => 'These guys are expert designers and developers, they know the industry well.'
);
$data['sponsors'][8] = array(
  'Level'       => null,
  'Name'        => 'Stickman Ventures',
  'URL'         => 'stickmanventures.com',
  'Logo'        => 'stickmanventures.png',
  'Description' => 'Build. Animate. Ship.',
  'Text'        => 'Stickman is an amazing and distributed group of technologists who produce cool things.'
);
$data['sponsors'][9] = array(
  'Level'       => null,
  'Name'        => 'Twitter',
  'URL'         => 'Twitter.com',
  'Logo'        => 'Twitter.png',
  'Description' => '',
  'Text'        => ''
);
$data['sponsors'][10] = array(
  'Level'       => null,
  'Name'        => 'NeverBoring',
  'URL'         => 'NeverBoring.com',
  'Logo'        => 'neverboring.png',
  'Description' => '',
  'Text'        => ''
);

/**
 * Sponsorship tiers
 */
$data['sponsorship'][] = array(
 'Name'         => 'Bronze',
 'Commitment'   => '$250',
 'Introduction' => 'brief'
);
$data['sponsorship'][] = array(
 'Name'         => 'Silver',
 'Commitment'   => '$500',
 'Introduction' => '30 seconds'
);
$data['sponsorship'][] = array(
 'Name'         => 'Gold',
 'Commitment'   => '$1000',
 'Introduction' => 'up to one minute'
);
$data['sponsorship'][] = array(
 'Name'         => 'Platinum',
 'Commitment'   => '$2000',
 'Introduction' => 'up to one minute',
 'Surprize'     => 'Platinum Sponsors can sponsor a surprise for the event.  Call us for more details.'
);

/**
 * Teams
 */
$data['teams'][] = array(
  'Name'       => 'Project Stormageddon',
  'Frameworks' => 'Angular.js / Slim / Swift',
  'Members'    => 'Matthew Davies<br>Nathan Bunney<br>Robert Huffman<br>Jared Hill',
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

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Plan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
 
</div>

    <?php
$wizard_config = [
	'id' => 'stepwizard',
	'steps' => [
		1 => [
			'title' => 'Step 1 – Your Destination',
			'icon' => 'fa fa-map-marker',
			'content' => '<h3>Step 1 - Your Destination</h3>
            Before you start planning a trip, first of all you have to decide on destination.<br> 
            Selecting the destination depends on several parameters:<br>
            1. When do you want to fly (weather has a big impact on destination) <br>
            2. For how long you want to fly (you have to pay attention the time of the trip,<br> because if this is a short period, it will be unnecessary to fly to a destination too far) 
            <br>3. What is your trip style (nature? shopping etc.) <br>
            4. Who do you want to travel? (Families, honeymoon, alone etc.) 
            
',
'skippable' => true,
		],
		2 => [
			'title' => 'Step 2 - Destination research and general route',
			'icon' => 'fa fa-search',
            'content' => '<h3>Step 2 - Destination research and general route</h3>
            Before booking flights, You have to be knowledgeable about your destination especially if the trip is more than 5 days.<br>
            Why? You need to know whether to book a return flight from another airport because of schedule constraints.<br>
            If this is just a short vacation for a few days, then you can skip this step and proceed to the next level of flight search.<br>
            <br>
            How to plan a general route for a trip?
            Search Google Places. <br>But not a general search, an accurate search for the things that interest you <br>(otherwise you get lost from most of the information on the Internet),
            <br> Such as looking for a place that has a water park or a place with wineries.
            <br>  Google search for a route is recommended for a destination such as search: <br<"trip route to Italy for two weeks" and look at recommended routes,
            <br> even you can use the route of an organized tour.
            <br> Look for "blogs for tours", because there are bloggers who write the tracks that they did
            <br> "Take a trip to Italy for a blog" or just go to blogs and see if they wrote a track on your desired destination.
            <br> Use sites that build routes like routerperfect, triphobo, inspirock
            
            
            <br>
            ',
			'skippable' => true,
        ],
        3 => [
			'title' => 'Step 3 - Flight Search',
			'icon' => 'fa fa-plane',
			'content' => '<h3>Step 3 - Flight Search</h3>
            After a decision on the destination and a general route, begin searching for flights.<br>
            In order to get tips for booking flights to any place you want
            <a href="https://thriftynomads.com/booking-cheapest-flight-possible-anywhere/">click here</a><br><br><br>
           
            ',
			'skippable' => true,
        ],
        4 => [
			'title' => 'Step 4 - Hotel, apartment or something else?',
			'icon' => 'fa fa-hotel',
			'content' => "<h3>Step 4 - Hotel, apartment or something else?</h3>
            Before you book for a place to sleep, it's important to know where you want to stay,<br>
            which requires further research.<br>
            First, choose the type of residence you want. Hotel or apartment, and of course what it includes.<br>
            You will also need to choose the type of accommodation you want.

            ",
			'skippable' => true,
        ],
        5 => [
			'title' => 'Step 5 - Rent a car or travel by public transportion?',
			'icon' => 'fa fa-taxi',
			'content' => '<h3>Step 5 - Rent a car or travel by public transportion?</h3>
                After booking flights, hotels and deciding on a route, you should figure out the best way to travel.<br>
                We personally prefer to rent a car because we like to stop on the road and make picnics. <br>Also more convenient to explore the areas like this.
                <br>If you like to explore lots of places, then the cost of taxis to unattended places can be quite expensive <br>and if you travel as a family then chances are cheaper to rent a car.
                <br>If you decide to travel on public transport, check before you go for a walk, <br>where you need to take all the vehicles and their hours of operation on the day of the trip.
           ',
			'skippable' => true,
		],
		6 => [
			'title' => 'Step 6 - Search for attractions, restaurants, bars and more',
			'icon' => 'fa fa-camera-retro',
            'content' => '<h3>Step 6 - Search for attractions, restaurants, bars and more</h3>
            We recommend making a list of things to do in each destination where there are restaurants and bars so you may want to visit.
            <br>The recommendations can be found in blogging, consulting groups on Facebook and searching on local testimonials like LikeALocal,
            Or Tripadvisor website.
            <br>Our advice: Look for the things that interest you precisely because there is no chance of getting everything according to the recommendations,
            <br>and this only causes unnecessary stress. <br>In addition, leave yourself time to do things spontaneously.

            ',
              'skippable' => true,
        ],
    ],
	'complete_content' => "<h1 class='complete'> Have a nice trip!<br><br><i class='fa fa-paper-plane' style='font-size:36px'></i></h1><br><br><p class='complete'> and if you want to start your search with Google right now..</p><script>//חיפוש בגוגל
    (function() {
      var cx = '013001557446479175799:udkhyqrrcwg';
      var gcse = document.createElement('script');
      gcse.type = 'text/javascript';
      gcse.async = true;
      gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(gcse, s);
    })();
  </script>
  <gcse:search></gcse:search>
  
  ", // Optional final screen
	'start_step' => 1, // Optional, start with a specific step
];
?>
<?= \drsdre\wizardwidget\WizardWidget::widget($wizard_config); ?>

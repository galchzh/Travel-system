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
			'title' => 'Step 1 - Decision on a target ',
			'icon' => 'fa fa-map-marker',
			'content' => '<h3>Step 1 - Decision on a target</h3><article>
            Before you start planning a trip, you have to first decide on the destination.
            <br> Selecting the target depends on several parameters<br>

            1. When do you want to fly (weather has a big impact on target selection) <br>

            2. For how long you want to fly (you have to take into account the time of the trip, because if this is a short period, it will be unnecessary to fly to a destination too far) <br>

            3. What is the nature of the trip (do you want a back stomach? Nature? Shopping and more) <br>

            4. What type of trip? (Families, honeymoon, alone and more) <br><br><br><br>
             </article>
',
'skippable' => true,
		],
		2 => [
			'title' => 'Step 2 - Research on the target itself and plan a general route',
			'icon' => 'fa fa-search',
			'content' => '<h3>Step 2 - Research on the target itself and plan a general route</h3>Before inviting Flights, should understand what it flying target especially if the trip is more than 5 days.<br>

            Why? Because you have to understand what route to know if you should fly and return from the same airport or return from a different airport.<br>
            
            If this is just a short vacation for a few days, then you can skip this step and proceed to the next level of flight search.<br><br>
            How to plan a general route for a trip?<br>
            
            Search Google Places. But not a general search but rather accurate about the things that interest you (otherwise you get lost from most of the information on the Internet).<br>
             Such as looking for a place that has a water park or a place with wineries.<br>
            
            
            Google search for a route is recommended for a destination such as search: "trip route to Italy for two weeks" and look at recommended routes,<br>
             even you can use the route of an organized tour.<br>
            
            
            Search blogs for tours, because there are bloggers who write the routes they did then you can search Google<br>
             "trip route in Italy Blog" or just go to blogs and see if they wrote a track on the target you want.<br>
            
            
            Use sites that build routes like routerperfect, triphobo, inspirock<br><br>
            
            
            <br>
            ',
			'skippable' => true,
        ],
        3 => [
			'title' => 'Step 3 - Flight Search',
			'icon' => 'fa fa-plane',
			'content' => '<h3>Step 3 - Flight Search</h3>
            After a decision on the destination and a general route begin searching for flights.<br>
            In order to get tips for booking flights to any place you want
            <a href="https://thriftynomads.com/booking-cheapest-flight-possible-anywhere/">click here</a><br><br><br>
           
            ',
			'skippable' => true,
        ],
        4 => [
			'title' => 'Step 4 - Hotel or apartment or something else?',
			'icon' => 'fa fa-hotel',
			'content' => '<h3>Step 4 - Hotel or apartment or something else?</h3>
            Before you look for a place to sleep, it is important to know which location to look for and this again requires a short study.<br>

            First, choose the type of residence you want. Hotel or apartment, and of course what it includes.<br>
            You will also need to choose the type of accommodation you want.<br><br><br>
           
            ',
			'skippable' => true,
        ],
        5 => [
			'title' => 'Step 5 - Rent a car or travel by public transport?',
			'icon' => 'fa fa-taxi',
			'content' => '<h3>Step 5 -  Rent a car or travel by public transport?</h3>
            After booking flights, hotels and deciding on a route should figure out the best way to travel.<br>
            We personally prefer to rent a car because we like to stop on the road and make picnics and also more convenient to explore the areas like this.<br>

            If you like to explore lots of places, then the cost of taxis to unattended places can be quite expensive and if you travel as a family then chances are cheaper to rent a car.<br>
            If you decide to travel on public transport, check before you go for a walk, where you need to take all the vehicles and their hours of operation on the day of the trip.<br><br><br>
            ',
			'skippable' => true,
		],
		6 => [
			'title' => 'Step 6 - Search for attractions, restaurants, bars and more',
			'icon' => 'fa fa-camera-retro',
            'content' => '<h3>Step 6 - Search for attractions, restaurants, bars and more</h3>
            Recommends making a list of things to do in any destination and in which restaurants bars and the like is worth visiting.<br>
            The recommendations can be found in blogging, consulting groups on Facebook and searching on local testimonials like LikeALocal.<br>
            Or Tripadvisor website tripadvisor.<br>

            A great site for searching Tours Get your guide.<br>

            Our advice: Look for the things that interest you precisely because there is no chance of getting everything according to the recommendations,<br> 
            and this only causes unnecessary stress. In addition, leave yourself time to do things spontaneously.',
            'skippable' => true,
        ],
    ],
	'complete_content' => "<h1 class='complete'> Have a nice trip!<br><br><i class='fa fa-paper-plane' style='font-size:36px'></i></h1><br><br>", // Optional final screen
	'start_step' => 1, // Optional, start with a specific step
];
?>
<?= \drsdre\wizardwidget\WizardWidget::widget($wizard_config); ?>

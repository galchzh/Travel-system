<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use kartik\icons\Icon;
Icon::map($this);

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<?php $this->beginBody() ?>


  

<div class="">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default navbar-fixed-top',
        ],
    ]);
?>

    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>

    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="../site/index">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#services">Values</a></li>
        <li><a href="#reviwes">Reviews</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="../site/plan">Plan</a></li>
        <li><a href="../site/wonders">7 Wonders</a></li>
        <li><a href="web/popular">3 Popular</a></li>
      </ul>
    
  

    <?php   echo Nav::widget([
        'options' => ['class' => 'nav navbar-nav navbar-right '],
        'items' => [
            Yii::$app->user->isGuest ? (
                Html::a('<i class="glyphicon glyphicon-user"></i> Sign Up',['/user/create'], ['class' => 'btn btn-black', 'title' => 'Sign Up'])
            ):(
                ['label' => '', 'url' => ['/site']] 
            )
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'nav navbar-nav navbar-right fixed'],
        'items' =>[
            Yii::$app->user->isGuest ? (
                Html::a('<i class="glyphicon glyphicon-log-in"></i> login',['site/login'], ['class' => 'btn btn-black', 'title' => 'login'])
            ) : (
            
            '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                '<i class="glyphicon glyphicon-log-out  "></i> Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-black btn-link logout']
            )
            . Html::endForm()
            . '</li>'
            
            )
        ],
    ]);

    
    NavBar::end();
    ?>
    </div>

    

  
  <div class="jumbotron text-center">
<h1>travel system</h1> 
		          		<fieldset>
		<a href="login.php" class="btn btn-default btn-lg">
          <span class="glyphicon glyphicon-user"></span> Log in
        </a>
		<a href="/user/create.php" class="btn btn-default btn-lg">
          <span class="glyphicon glyphicon-edit"></span> Registration
        </a>

      
		</fieldset>
</div>
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
	<h2>About Our System</h2>
	<h4>Our system support costumers references in diffrend kind of topics</h4> 
	<p>Let us know about yours problems or concerns and we will take care of it in less then 24 hours.
	We suggest a few ways of contact, availability and privacy service to our costumers</p>
		<a href="#contact" class="btn btn-default btn-lg">
          <span class="glyphicon glyphicon-envelope"></span> Get in Touch
        </a>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-signal logo"></span>
    </div>
  </div>
</div>

<div id="services" class="container-fluid text-center">
  <h2>VALUES</h2>
  <br>
  <div class="row">

    <div class="col-sm-4">
      <span class="glyphicon glyphicon-phone logo-small"></span>
      <h4>MOBILE </h4>
      
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-lock logo-small"></span>
      <h4>PRIVACY</h4>
    </div>
	
	<div class="col-sm-4">
      <span class="glyphicon glyphicon-time logo-small"></span>
      <h4>AVAILABILITY</h4>
      
    </div>
   
    <br><br>
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-leaf logo-small"></span>
      <h4>GREEN</h4>

    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-usd logo-small"></span>
      <h4>FREE</h4>

    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-ok logo-small"></span>
      <h4>CUSTOMER SERVICE</h4>

    </div>
  </div>
</div>
<div id="reviwes" class="container-fluid text-center">
<h2>REVIEWS</h2>

<div id="myCarousel" class="carousel slide text-center container-fluid" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
    <h4>"This system is the best."<br><span style="font-style:normal;">David Cohen, Mechanical engineering student </span></h4>
    </div>
    <div class="item">
      <h4>"Highly recommended"<br><span style="font-style:normal;">Noa Bar, Industrial engineering student</span></h4>
    </div>
    <div class="item">
      <h4>"Fast, Easy, User-Friendly"<br><span style="font-style:normal;">Tal Itzhak ,Construction engineering student</span></h4>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Jerusalem , Israel</p>
      <p><span class="glyphicon glyphicon-phone"></span> +972 547858178</p>
      <p><span class="glyphicon glyphicon-envelope"></span> sharingcaring@gmail.com</p>
    </div>
<section id="mainform" class="container">
<form role="form"  id="reference" action="/finalProject/homePage.php" method="post">

    <div class="col-sm-7">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control requiredField" id="firstname" name="firstname" placeholder="Please enter first name" type="text" required="">
        </div>
		 <div class="col-sm-6 form-group">
          <input class="form-control requiredField" id="lastname" name="lastname" placeholder="Please enter last name" type="text" required="" >
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control requiredField" id="email" name="email" placeholder="Email" type="Please enter email" required="">
        </div>
		<div class="col-sm-6 form-group">
          <input class="form-control requiredField" id="tel" name="tel" placeholder="Please enter Tel. number" type="text" required="" >
        </div>
		<div class="col-sm-6 form-group">
          <input class="form-control requiredField" id="account" name="account" placeholder="Please enter account number" type="text" required="">

        </div>
   
      </div>
      <textarea class="form-control requiredField" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button  type="submit" class="btn btn-default pull-right" >Send</button>
        </div>
      </div>
    </div>
</form>
        

</section>	
</div>
</div>


<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<script>
$(document).ready(function(){
  // Add scrollspy to <body>
  $('body').scrollspy({target: ".navbar", offset: 10});   

  // Add smooth scrolling on all links inside the navbar
  $("#myNavbar a").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    }  // End if
  });
});
</script>
<style>
    .error{
	color: red;
}
.bold{
	font-weight: bold;
}
.jumbotron { 
    background-color: #ffaa80; 
    color: #ffffff;
	padding: 100px 25px;
}
.bg-grey {
    background-color: #f6f6f6;
}


.container-fluid {
    padding: 60px 50px;
}

.logo {
    font-size: 200px;
}
@media screen and (max-width: 768px) {
    .col-sm-4 {
        text-align: center;
        margin: 25px 0;
    }
}
.logo-small {
    color: #ffaa80;
    font-size: 50px;
}

.logo {
    color: #ffaa80;
    font-size: 200px;
}
.carousel-control.right, .carousel-control.left {
    background-image: none;
    color: #ffaa80;
}

.carousel-indicators li {
    border-color: #ffaa80;
}

.carousel-indicators li.active {
    background-color: #ffaa80;
}

.item h4 {
    font-size: 19px;
    line-height: 1.375em;
    font-weight: 400;
    font-style: italic;
    margin: 70px 0;
}

.item span {
    font-style: normal;
}
.navbar {
    margin-bottom: 0;
    background-color:#ffaa80;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 4px;
    border-radius: 0;
}

.navbar li a, .navbar .navbar-brand {
    color: #fff !important;
}

.navbar-nav li a:hover, .navbar-nav li.active a {
    color:#ffaa80 !important;
    background-color: #fff !important;
}

.navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
}
@import "bourbon";

body {
	background: #eee !important;
	font-family:"Comic Sans MS", cursive, sans-serif;	
}

.wrapper {	
	margin-top: 80px;
  margin-bottom: 80px;
}

.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);  

  .form-signin-heading,
	.checkbox {
	  margin-bottom: 30px;
	}

	.checkbox {
	  font-weight: normal;
	}

	.form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 10px;
		@include box-sizing(border-box);

		&:focus {
		  z-index: 2;
		
		}
	}

	input[type="text"] {
	  margin-bottom: -1px;
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	}

	input[type="password"] {
	  margin-bottom: 20px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
    }
    </style>
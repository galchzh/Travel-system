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

<?php $this->title = 'Home'; ?>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<?php $this->beginBody() ?>

<div class="">
    <?php
    NavBar::begin([
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default navbar-fixed-top',
        ],
    ]);
  ?>

    <div class="navbar-header collapse navbar-collapse" id="myNavbar">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
  <nav role="navigation">
    <div id="menuToggle">
    
      <input type="checkbox" size:"lg"/>
      <span></span>
      <span></span>
      <span></span>
  
      <ul class="collapse navbar-collapse" id="menu">
      <li><i class="glyphicon glyphicon-home" ></i> <a href="../web/index.php"> Home</a></li>
      <li><i class="glyphicon glyphicon-pencil" ></i><a href="../web/index.php#about"> About</a></li>
      <li><i class="glyphicon glyphicon-heart" ></i><a href="../web/index.php#try"> Popular & Recommended</a></li>
      <li><i class="glyphicon glyphicon-thumbs-up" ></i><a href="../web/index.php#reviwes"> Reviews</a></li>  
      </ul>
    </div>
  </nav>
</div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="../web/index.php/site/about">About</a></li>
        <li><a href="../web/index.php/site/contact">Contact</a></li>
        <li><a href="../web/index.php/article">Articles</a></li>    
        <li><a href="../web/index.php/site/plan">Plan</a></li>
        <li><a href="../web/index.php/site/wonders">7 Wonders</a></li>
        <li><a href="../web/index.php/site/popular">3 Popular</a></li>
    
      </ul>
    
  

    <?php   echo Nav::widget([
        'options' => ['class' => 'nav navbar-nav navbar-right '],
        'items' => [
            Yii::$app->user->isGuest ? (
                Html::a('<i class="glyphicon glyphicon-user"></i> Sign Up',['user/create'], ['class' => 'btn btn-black', 'title' => 'Sign Up'])
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
                '<i class="glyphicon glyphicon-log-out"></i> Logout (' . Yii::$app->user->identity->username . ')',
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
  <h1>Travel System</h1> 
                  <fieldset>
    <a href="../web/index.php/site/login" class="btn btn-default btn-lg">
          <span class="glyphicon glyphicon-user"></span> Log in
        </a>
    <a href="../web/index.php/user/create" class="btn btn-default btn-lg">
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
    <a href="#contact" class="btn btn-default btn-lg" id="try">
          <span class="glyphicon glyphicon-envelope"></span> Get in Touch
        </a>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-signal logo"></span>
    </div>
  </div>
</div>
<div>
  <div id="popular">
  <section id="ht-kb-articles-widget-2" class="widget hkb_widget_articles" style="float:right;">
    <h3 class="widget__title" style="margin:5%; margin-top:-2px; color:black;">Popular Articles</h3>
    <ul>
      <li class="hkb-widget-article__format-standard"><a class="hkb-widget__entry-title" href="https://demo.herothemes.com/knowall/knowledge-base/how-to-create-an-account/">How to Create an Account</a></li>
      <li class="hkb-widget-article__format-standard"><a class="hkb-widget__entry-title" href="https://demo.herothemes.com/knowall/knowledge-base/how-does-the-30-day-money-back-guarantee-work/">How Does the 30 Day Money Back Guarantee Work?</a></li>
      <li class="hkb-widget-article__format-standard"><a class="hkb-widget__entry-title" href="https://demo.herothemes.com/knowall/knowledge-base/how-our-pricing-plans-work/">How Our Pricing Plans Work</a></li>
      <li class="hkb-widget-article__format-standard"><a class="hkb-widget__entry-title" href="https://demo.herothemes.com/knowall/knowledge-base/how-can-i-edit-my-already-existing-page/">How Can I Edit My Already Existing Page?</a></li>
      <li class="hkb-widget-article__format-standard"><a class="hkb-widget__entry-title" href="https://demo.herothemes.com/knowall/knowledge-base/what-are-the-api-limits/">What Are the API Limits?</a></li></ul>
  </section> 
      </div>
</div>
<div style:"padding:5px;">
<div id="recommended"  style="float:left; text-align:center; border-radius: 56px;
    background: #c5deec;
    padding: 10px;
    line-height: 1.8;">
  <h2 style="color:black">Recommended Articles</h2>  
  <div class="row">
          <div class="child child1">
            <a href="../web/index.php/site/plan">
                <div class="maintext" >
                    <h2>Start planning your Trip!</h2> 
                    <p></p>
                    <img class="mainphoto" src="../images/plan.gif">

                </div>
            </a>
          </div>
          <div class="child child2">
             <a href="../web/index.php/site/wonders">
                <div class="maintext" >
                    <h2>7 World Wonders</h2> 
                    <p></p>
                    <img class="mainphoto" src="../images/globe.gif">

                </div>
            </a>
            </div>
          <div class="child child3">
            <a href="../web/index.php/site/popular">
                <div class="maintext" >
                    <h2>3 Popular Places</h2> 
                    <p></p>
                    <img class="mainphoto" src="../images/walk.gif">

                </div>
            </a>
            </div>
          
        </div>
   </div>
</div>
</div>
</div>

<div>
<div style:"padding:5px;">
<div id="reviwes" class="container-fluid text-center">

<h2 style:"margin-top:300px; margin-buttom:-30%;">Reviews</h2>

<div id="myCarousel" class="carousel slide text-center container-fluid" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox" style="background-color: #c5deec; border-radius: 25px;">
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
.row {
    width: 100%; /* Try setting this to 400px or something */
    display: table;
    text-align:center;
   
}
.child{
  display: table-cell;
  box-sizing: border-box;

}
 .child1 {
    width: 40%;
    height: auto;
    padding-left:-10px;
}

.child2 {
  width: 20%;
    height: auto;
}
.child3 {
    width: 33%;
    height: auto;
} 
.mainphoto{
  border-radius: 50%;
    width: 60%;
    height: auto;
    display: block;
    margin-left: auto;
    margin-right: auto;
}
.maintext {
    text-align: center;
    width:100%;

    /* Decorative .. */
    /* min-height: 40px; */
}
.child:first-child .maintext {
    margin-left: -10;
}
.hkb-widget__entry-title
{
  color: #232323;
}

a:link, a:visited, a
{
  text-decoration: none;
   color: #232323;
    
  transition: color 0.3s ease;
}
#recommended
{
 width: 55%;
 float:left;
}

a:hover
{
  color: #ffffff;
}

#menuToggle
{
  display: block;
  position: absolute;
  top: 15px;
  left: 23px;
  z-index: 1;
  -webkit-user-select: none;
  user-select: none;
}

#menuToggle input
{
  display: block;
  width: 45px;
  height:50px;
  position: absolute;
  top: -7px;
  left: -5px;
  cursor: pointer;
  opacity: 0; /* hide this */
  z-index: 2; /* and place it over the hamburger */
  -webkit-touch-callout: none;
}

/*
 * Just a quick hamburger
 */
#menuToggle span
{
  display: block;
  width:33px;
  height: 4px;
  margin-bottom: 5px;
  position: relative;
  background: #cdcdcd;
  border-radius: 3px;
  
  z-index: 1;
  
  transform-origin: 4px 0px;
  
  transition: transform 0.5s cubic-bezier(0.77,0.2,0.05,1.0),
              background 0.5s cubic-bezier(0.77,0.2,0.05,1.0),
              opacity 0.55s ease;
}

#menuToggle span:first-child
{
  transform-origin: 0% 0%;
}

#menuToggle span:nth-last-child(2)
{
  transform-origin: 0% 100%;
}

/* 
 * Transform all the slices of hamburger
 * into a crossmark.
 */
#menuToggle input:checked ~ span
{
  opacity: 1;
  transform: rotate(45deg) translate(-2px, -1px);
  background: #232323;
}

/*
 * But let's hide the middle one.
 */
#menuToggle input:checked ~ span:nth-last-child(3)
{
  opacity: 0;
  transform: rotate(0deg) scale(0.2, 0.2);
}

/*
 * Ohyeah and the last one should go the other direction
 */
#menuToggle input:checked ~ span:nth-last-child(2)
{
  transform: rotate(-45deg) translate(0, -1px);
}

/*
 * Make this absolute positioned
 * at the top left of the screen
 */
#menu
{
  text-align:left;
    position: absolute;
    width: 235px;
    height:100px;
    margin: -100px 0 0 -50px;
    padding: 0px 0px 0px 100px;
    padding-top: 96px;
    padding-left: 33px;
    background: #48b7;
    list-style-type: none;
    -webkit-font-smoothing: antialiased;
    transform-origin: 0% 0%;
  transform: translate(-100%, 0);
  
  transition: transform 0.5s cubic-bezier(0.77,0.2,0.05,1.0);
}

#menu li
{
  padding: 10px ;
  font-size: 22px;
}

/*
 * And let's slide it in from the left
 */
#menuToggle input:checked ~ ul
{
  transform: none;
}
.widget {
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    border-radius: 56px;
    background: #c5deec;
    padding: 10px;
    font-size: 14px;
    line-height: 1.8;
    margin: 23px -5px 0px 0px;
}
</style>
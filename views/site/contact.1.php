<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact Page';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

<?php if(Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
<div id="alert" class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>
        <div class="alert alert-success">
            Thank you for Feedback. we will respond as soon as possible.
        </div>


    <?php else: ?>
                  
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
<?php echo "<form role='form' id='reference' action='".$_SERVER['PHP_SELF']."' method='post'>"?>

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
</div>
<?php endif; ?>
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

  <?php if(Yii::$app->session->hasFlash('FeedSubmitted')): ?>

<div class="row">
    <div class="col-lg-4">&nbsp;</div>
    <div class="col-lg-5">
        <div class="panel panel-default">
          <div class="panel-heading">Message Sent</div>
            <div class="panel-body">
                <p><b>First Name:</b> <?=$model->firstname?></p>
                <p><b>Last Name:</b> <?=$model->lastname?></p>
                <p><b>E-mail:</b> <?=$model->email?></p>
                <p><b>Tel:</b> <?=$model->tel?></p>
                <p><b>Account Num:</b> <?=$model->account?></p>
                <p><b>Your comments:</b> <?=$model->comments?></p>
            </div>
        </div>
        <div class="alert alert-success">
        Thank you for contacting us. We will respond to you as soon as possible.
        </div>
    </div>
</div>


</div>

<?php else :?>
<div class="row">
    <div class="col-sm-5"><br><br><br><br>
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Jerusalem , Israel</p>
      <p><span class="glyphicon glyphicon-phone"></span> +972 547858178</p>
      <p><span class="glyphicon glyphicon-envelope"></span> sharingcaring@gmail.com</p>
    </div>


<section id="mainform" class="container">
   
    <div class="col-sm-7 panel-default bd">
        <div><h1 align="center"><?=Html::encode($this->title)?></h1></div>
        <?php $form=ActiveForm::begin(['id' => 'grievance-form reference']);?>
      
      <div class="row">
      <div class="col-sm-6 form-group">
      <?php echo $form->field($model, 'firstname', [
           'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
     ])->textInput()->input('firstname', ['placeholder' => "Enter Your First Name"])->label(false); ?>
        </div>
        <div class="col-sm-6 form-group">
        <?php echo $form->field($model, 'lastname', [
           'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
     ])->textInput()->input('lastname', ['placeholder' => "Enter Your Last Name"])->label(false); ?>
        </div>
        <div class="col-sm-6 form-group">
        <?php echo $form->field($model, 'email', [
           'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
     ])->textInput()->input('email', ['placeholder' => "Enter Your Email"])->label(false); ?>
        </div>
        <div class="col-sm-6 form-group">
        <?php echo $form->field($model, 'tel', [
           'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
     ])->textInput()->input('tel', ['placeholder' => "Enter Your Tel. Number"])->label(false); ?>
        </div>
        <div class="col-sm-6 form-group">
        <?php echo $form->field($model, 'account', [
           'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
     ])->textInput()->input('account', ['placeholder' => "Enter Your Account Number"])->label(false); ?>
        </div>
        <div class="col-sm-6 form-group">
        <?php echo $form->field($model, 'comments', [
           'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
     ])->textArea(['rows'=>5, 'placeholder' => "Enter Your Comments"])->label(false); ?>
</div>
</div>
       
        <div class="row">
        <div class="col-sm-12 form-group">
        <div class="form-group subbtn">
            <?= Html::submitButton('<i class="glyphicon glyphicon-send")></i> Submit',['class' => 'btn btn-primary pull-right','name' => 'send-button'])?>
        </div>
        </div>
</div>
      
    <?php ActiveForm::end(); ?>

<?php endif; ?>

</div>


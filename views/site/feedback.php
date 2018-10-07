<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;


$this->title = 'Feedback Page';
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
            Thank you for Feedback. we will respond as soon as possible.
        </div>
    </div>
</div>
        
</div>

<?php else :?>

<div class="row ct">
    <div class="col-lg-3"></div>
    <div class="col-lg-6 panel panel-default bd">
        <div><h1 align="center"><?=Html::encode($this->title)?></h1></div>
        <?php $form=ActiveForm::begin(['id' => 'grievance-form']);?>
        <?php echo $form->field($model,'firstname')?>
        <?php echo $form->field($model,'lastname')?>
        <?php echo $form->field($model,'email')?>
        <?php echo $form->field($model,'tel')?>
        <?php echo $form->field($model,'account')?>
        <?php echo $form->field($model,'comments')->textArea(['rows'=>6])?>
       

        <div class="form-group">
            <?= Html::submitButton('<i class="glyphicon glyphicon-sent")></i> Submit',['class' => 'btn btn-primary','name' => 'send-button'])?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
</div>
<?php endif; ?>

</div>


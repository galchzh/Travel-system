<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Rating */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rating-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'articleId')->textInput() ?>

    <?= $form->field($model, 'rate')->textInput() ?>

    <?= $form->field($model, 'authorId')->textInput() ?>

    <?= $form->field($model, 'vote_count')->textInput() ?>

    <?= $form->field($model, 'vote_average')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vote_sum')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

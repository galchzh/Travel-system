<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Status;
use app\models\User;
use app\models\Category;
use dosamigos\selectize\SelectizeTextInput;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?php if (\Yii::$app->user->can('updateStatus')): ?>
    <?= $form->field($model, 'status')->dropDownList(      
          ArrayHelper::map(Status::find()->asArray()->all(), 'id', 'name') ) ?>
             <?php endif; ?>

    <?= $form->field($model, 'author_id')->dropDownList(
        ArrayHelper::map(User::find()->asArray()->all(), 'id', 'name')    ) ?>

    <?= $form->field($model, 'editor_id')->dropDownList(
        ArrayHelper::map(User::find()->asArray()->all(), 'id', 'name')    ) ?>


     <?= $form->field($model, 'category_id')->dropDownList(
        ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'name')  ) ?>

    <?= $form->field($model, 'tagNames')->widget(SelectizeTextInput::className(), [
    // calls an action that returns a JSON object with matched tags
    'loadUrl' => ['tag/list'],
    'options' => ['class' => 'form-controll'],
    'clientOptions' => [
        'plugins' => ['remove_button'],
        'valueField' => 'name',
        'labelField' => 'name',
        'searchField' => ['name'],
        'create' => true,
    ],
])->hint('Use commas to separate tags') ?>


    <?php // $form->field($model, 'created_at')->textInput() ?>

    <?php // $form->field($model, 'updated_at')->textInput() ?>

    <?php // $form->field($model, 'created_by')->textInput() ?>

    <?php // $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
 

</div>

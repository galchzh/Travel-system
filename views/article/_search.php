<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Article;
use yii\widgets\ActiveForm;
use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;
use yii\data\SqlDataProvider;


/* @var $this yii\web\View */
/* @var $model app\models\ArticleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-search">

     <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
<?php 
    
    $a=ArrayHelper::map(article::find()->all(),'id','title');
    $b=ArrayHelper::map(article::find()->all(),'id','body');
    $c=ArrayHelper::map(article::find()->all(),'id','description');
    $x= ArrayHelper::merge ( $a, $b, $c );
    
    echo $form->field($model, 'globalSearch')->widget(TypeaheadBasic::classname(),
        [
            'data' =>$x,
            'scrollable' => true,
            'dataset' => ['limit' => 10],
            'pluginOptions' => ['highlight' => true],
            'options' => ['placeholder' => 'Filter as you type ...'],
        
        ]);
    
    ?>


  

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset',['index'], ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

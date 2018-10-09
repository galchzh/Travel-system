

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
// use hauntd\vote\behaviors\VoteBehavior;
// use kartik\social\Disqus;
use yii\helpers\Url;
use kartik\social\FacebookPlugin;
use kartik\social\TwitterPlugin;
use yii\widgets\ActiveForm;
use app\models\Rating;
use app\models\Status;
use kartik\rating\StarRating;
use yii\web\JsExpression;



/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description',
            [
                'label' => 'Status',
                'value' => $model->statuses->name
            ],
            'body:ntext',
            //'author_id',
           [                      
                'label' => 'Author',
				'format' => 'html',
				'value' => Html::a($model->authors->name, 
					['user/view', 'id' => $model->authors->id]),                
            ],
           // 'editor_id',
           [                      
            'label' => 'Editor',
            'format' => 'html',
            'value' => Html::a($model->editors->name, 
                ['user/view', 'id' => $model->editors->id]),                
            ],
            [
                'label' => 'Category',
                'value' => $model->categories->name
            ],
            //'category_id',
            'created_at',
            'updated_at',
            //'created_by',
            [
                'label' => 'Created By',
                'value' => $model->createdBy->name
            ],
            [
                'label' => 'Updated By',
                'value' => $model->updatedBy->name
            ],
           // 'updated_by',
        ],
    ]) ?>

    <!-- <p> if you want to rate this article please click here:</p><br> 
    <a href="../web/index.php/rating/create?u=<?php// echo $_SESSION[$model->id] ?>"> click me</a></p>
       -->
    <!-- <div class="form-group">
    <?php // Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php// ActiveForm::end(); ?> -->
  

   


  <?php echo FacebookPlugin::widget([]);?>
  <?php echo FacebookPlugin::widget(['type'=>FacebookPlugin::LIKE, 'settings' => ['size'=>'small']]);?>
  <?php
//echo FacebookPlugin::widget(['type'=>FacebookPlugin::SAVE, 'settings' => ['size'=>'small', 'uri'=>Url::current([], true)]]);
  echo FacebookPlugin::widget(['type'=>FacebookPlugin::SHARE, 'settings' => ['size'=>'small', 'layout'=>'button_count', 'mobile_iframe'=>'false']]);
 // echo FacebookPlugin::widget(['type'=>FacebookPlugin::FOLLOW, 'settings' => ['href'=>'http://facebook.com/<page_name>']]);

 echo TwitterPlugin::widget([]);
// echo TwitterPlugin::widget(['type'=>TwitterPlugin::FOLLOW, 'settings' => ['size'=>'large']]);
// echo TwitterPlugin::widget(['type'=>TwitterPlugin::HASHTAG, 'hashTag'=>'Travel', 'settings' => ['size'=>'small']]);




?>
  
<?php 
// \hauntd\vote\widgets\Vote::widget([
//   'entity' => 'itemVote',
//   'model' => $model,
//   'options' => ['class' => 'vote  vote-visible-buttons']
// ]);

//  \hauntd\vote\widgets\Favorite::widget([
//     'entity' => 'itemFavorite',
//     'model' => $model,
// ]);

//  \hauntd\vote\widgets\Like::widget([
//     'entity' => 'itemLike',
//     'model' => $model,
// ]); ?>

</div>

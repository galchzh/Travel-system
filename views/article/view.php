<?php
namespace app\models;
use yii;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use kartik\social\FacebookPlugin;
use kartik\social\TwitterPlugin;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Rating;
use kartik\rating\StarRating;
use yii\web\JsExpression;
use app\models\User;
use app\models\Tag;
use yii\grid\GridView;





/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles','url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
       
<div class="article-view">
    

    <p>
        <?php  if (\Yii::$app->user->can('author')): ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<?php endif;  if (\Yii::$app->user->can('admin')): ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
         <?php endif; ?>
    </p>
   

    <div class="row">
    <div class="col-lg-10">&nbsp;</div>
    <div class="col-lg-10">
        <div class="panel panel-default" style="float:right;padding: 18px 0px 100px 15px;
                     margin: 5px ;">
          
            <div class="panel-body">
            <h1> <?=$model->title?></h1>
               
               <?php $createdAt = $model->created_at ?>
              <?php $cleantime=substr($createdAt,0,-3)?>
               <p> <?=$cleantime ?></p>
			   <p>
			    <?= DetailView::widget([
					'model' => $model, 
					 'options' => ['class' => ''],    
					'attributes' => [
						[
							'attribute' =>'',
							'format' => 'paragraphs',
							'value' => $model->description,
							'contentOptions' => [ 'style'=>' color:gray;' ],
						],  
					],
					]) ?>

               </p>
                <br>
                <br>
				<p>
				  <?= DetailView::widget([
					'model' => $model, 
					 'options' => ['class' => ''],    
					'attributes' => [
						[
							'attribute' =>'',
							'format' => 'paragraphs',
							'value' => $model->body,
							'contentOptions' => [ 'style'=>' overflow: auto; word-wrap: break-word; margin: 5px 18px 9px; padding:8px; font-size: 14px; line-height: 1.8;' ],
						],  
					],
					]) ?>
						</p>	
							
                
                <p class="author"> -<?=$model->createdBy->name?>-</p>
<br><br>
                

    <div class="detail-disposal">
                    <?= DetailView::widget([
        'model' => $model,
        'options' => ['class' => 'detail1-view tags'],    
        'attributes' => [
            [
                'label' => 'Tags',
                'format' => 'html',
                'value' => $tags
            ],
           
        ],
    ]) ?>
     <?= DetailView::widget([
        'model' => $model,
        'options' => ['class' => 'detail1-view'],    
        'attributes' => [
            [
                'label' => 'Category',
                'format' => 'html',
                'value' => Html::a($model->categories->name, 
					['category/view', 'id' => $model->categories->id]),
            ],  
        ],
    ]) ?>
              
            </div>
        </div>
      
        <?php if(!(Yii::$app->session->hasFlash('RateSubmitted'))): ?>
        <div style=" margin: auto;  width: 45%; padding-left: 100px;">
        <?php $form = ActiveForm::begin(); ?>
        <?php $model->rate = 0;?>
        <?php echo $form->field($model, 'rate')->widget(StarRating::classname(), [
                'pluginOptions' => ['size'=>'lg', 'showCaption' => true,  'showClear' => false,]
                     ]); ?>

                     

            <div class="form-group">
            <?= Html::submitButton('<i class="glyphicon glyphicon-send")></i> Save', ['class' => 'btn btn-primary', 'style' => 'margin-left:25%;']) ?>
            </div>
            </div>
        <?php ActiveForm::end(); ?>
        
        <?php else : ?>
            
        <div style=" margin: auto;  width: 55%; padding: 10px;">
        <div class="alert alert-info" role="alert" style="text-align:center; width: 80%; margin-left:10%;">
                Thank you for rating this article with <?= $model->rate?>  
                <?php if ($model->rate == 0.5) :?> star.. We will improve next time!<br>
                <i class="glyphicon glyphicon-star font half" ></i>
                <?php elseif ($model->rate == 1) :?> star.. We will improve next time!<br>
                <i class="glyphicon glyphicon-star font" ></i>
                <?php elseif ($model->rate == 1.5) :?> stars.. We will improve next time!<br>
                <i class="glyphicon glyphicon-star font" ></i>
                <i class="glyphicon glyphicon-star font half" ></i>
                <?php elseif ($model->rate == 2) :?> stars.. We will improve next time!<br>
                <i class="glyphicon glyphicon-star font" ></i>
                <i class="glyphicon glyphicon-star font" ></i>
                <?php elseif ($model->rate == 2.5) :?> stars.. We will improve next time!<br>
                <i class="glyphicon glyphicon-star font" ></i>
                <i class="glyphicon glyphicon-star font" ></i>
                <i class="glyphicon glyphicon-star font half" ></i>
                <?php elseif ($model->rate == 3) :?> stars! Hope to see you again!<br>
                <i class="glyphicon glyphicon-star font" ></i>
                <i class="glyphicon glyphicon-star font" ></i>
                <i class="glyphicon glyphicon-star font" ></i>
                <?php elseif ($model->rate == 3.5) :?> stars! Hope to see you again!<br>
                <i class="glyphicon glyphicon-star font" ></i>
                <i class="glyphicon glyphicon-star font" ></i>
                <i class="glyphicon glyphicon-star font" ></i>
                <i class="glyphicon glyphicon-star font half" ></i>
                <?php elseif ($model->rate == 4) :?> stars! Hope to see you again!<br>
                <i class="glyphicon glyphicon-star font" ></i>
                <i class="glyphicon glyphicon-star font" ></i>
                <i class="glyphicon glyphicon-star font" ></i>
                <i class="glyphicon glyphicon-star font" ></i>
                <?php elseif ($model->rate == 4.5) :?> stars! Hope to see you again!<br>
                <i class="glyphicon glyphicon-star font" ></i>
                <i class="glyphicon glyphicon-star font" ></i>
                <i class="glyphicon glyphicon-star font" ></i>
                <i class="glyphicon glyphicon-star font" ></i>
                <i class="glyphicon glyphicon-star font half" ></i>
                <?php elseif ($model->rate == 5) :?> stars! Hope to see you again!<br>
                <i class="glyphicon glyphicon-star font" ></i>
                <i class="glyphicon glyphicon-star font" ></i>
                <i class="glyphicon glyphicon-star font" ></i>
                <i class="glyphicon glyphicon-star font" ></i>
                <i class="glyphicon glyphicon-star font" ></i>
        <?php endif;?>
        </div>
        </div>
       
        <?php endif;?>
    <div class = "related"><br>
        <h2>Related Articles - Same Category: </h2><br>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}{pager}',
	  'columns' => [
		['class' => 'yii\grid\SerialColumn',
	    'headerOptions' => ['style' => 'width:5%; text-align:center'],],
		[ 'attribute' => 'title',
         'headerOptions' => ['style' => ' text-align:center'],],
        [ 'attribute' => 'description',
         'headerOptions' => ['style' => ' text-align:center'],],
     
        ['class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['style' => 'width:10%;'],
            'template' => '{view}',               
        ]]]); ?>
 </div>
        
    </div>
</div>


  <style>
  .related
  {
      text-align:center;
      margin-left: 5%;
      margin-right: 5%;
  }
 .half {
    position:relative;
}
.font{
    font-size:1.25em;
}
.half:before {

      content: "\e006"; /* put here default icon code*/
      width: 47%;
      display: block;
      position: absolute;
      overflow: hidden;

}
.half:after {
    content: "\e007"; /* put here icon-empty code*/
}

.half-heart:before {

      content: "\e005"; /* put here default icon code*/
      width: 57%;
      display: block;
      position: absolute;
      overflow: hidden;

}
.half-heart:after {
    content: "\e143"; /* put here icon-empty code*/
}
      .author
      {
        margin: 60px 0px 0px 700px;
      }

      .detail-disposal
      {
        position:relative;
        width:100%;
      }
.detail1-view {
    margin-left:20px;
    margin-bottom:20px;
    float:left;
    width: 300px;  
    }
.tags
{
    padding:10px;
}
      </style>



  <?php echo FacebookPlugin::widget([]);?>
  <?php echo FacebookPlugin::widget(['type'=>FacebookPlugin::LIKE, 'settings' => ['size'=>'small']]);?>
  <?php
//echo FacebookPlugin::widget(['type'=>FacebookPlugin::SAVE, 'settings' => ['size'=>'small', 'uri'=>Url::current([], true)]]);
  echo FacebookPlugin::widget(['type'=>FacebookPlugin::SHARE, 'settings' => ['size'=>'small', 'layout'=>'button_count', 'mobile_iframe'=>'false']]);
 // echo FacebookPlugin::widget(['type'=>FacebookPlugin::FOLLOW, 'settings' => ['href'=>'http://facebook.com/<page_name>']]);
?> <br> <br>
<?php echo TwitterPlugin::widget([]);
// echo TwitterPlugin::widget(['type'=>TwitterPlugin::FOLLOW, 'settings' => ['size'=>'large']]);
// echo TwitterPlugin::widget(['type'=>TwitterPlugin::HASHTAG, 'hashTag'=>'Travel', 'settings' => ['size'=>'small']]);




?>
  


</div>
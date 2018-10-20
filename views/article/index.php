<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Status;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php if (\Yii::$app->user->can('createArticle')): ?>
    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>    
    </p>
    <?php endif; ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-hover'],
        'rowOptions' => function($model){

                if($model->status == 1) 
                {
                    return ['class'=>'status1']; 
                }
                else if ($model->status == 2) 
                {
                    return ['class'=>'status2']; 
                }
                else 
                {
                    return ['class'=>'status3']; 
                }
         
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
           // 'id',
            'title',
            'description',
            'body:ntext',
            //'author_id',
            [
                'attribute'=>'author_id',
                'value' => 'authors.name'
            ],
           // 'status',
            [
                'attribute'=>'status',
                'value' => 'statuses.name',
                'visible' => Yii::$app->user->can('author'),

            ], 
            [
                'attribute'=>'category_id',
                'value' => 'categories.name',
               
            ],
            [
                'label' => 'Rate',
                'value' => 'average',
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
         
            //'editor_id',
            //'category_id',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            ['class' => 'yii\grid\ActionColumn', 
            'template' => '{view}{update}{delete}',
            'visible' => (Yii::$app->user->can("admin")),
           
        ],

           ['class' => 'yii\grid\ActionColumn',
               'template' => '{view}{update}',
            'visible' => (Yii::$app->user->can("author") & !(Yii::$app->user->can("admin"))),
            

        ],
        ['class' => 'yii\grid\ActionColumn',
               'template' => '{view}',
            'visible' => (!Yii::$app->user->can("author")),
           

        ],

       ],

    ]); ?>
   

    <style>
    
    .status1
    {
        background-color: #e6ffe6 !important;
        color: green !important;
    }
    .status2
    {
        background-color: #d9edf7 !important;
        color:	#003399 !important;
    }
    .status3
    {
        background-color: #fcf8e3 !important;
        color: orange !important;
    }
</style>


    
</div>

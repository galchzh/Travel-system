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
    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
        

        
    ]);  ?>



    
</div>

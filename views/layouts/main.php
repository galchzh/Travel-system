<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use kartik\icons\Icon;
Icon::map($this);

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'nav nav-tabs navbar-default navbar-fixed-top',
        ],
    ]); ?>
    
   <?php echo Nav::widget([
        'options' => ['class' => 'nav navbar-nav'],
        'items' => [
            ['label' => 'Users', 'url' => ['../index.php/user'],  'visible' => Yii::$app->user->can('manageUsers'),],
            ['label' => 'Home', 'url' => ['../index.php']],           
            ['label' => 'About', 'url' => ['../index.php/site/about']],
            ['label' => 'Contact', 'url' => ['../index.php/site/contact']],
            ['label' => 'Articles', 'url' => ['../index.php/article/']],
            ['label' => 'Plan', 'url' => ['../index.php/site/plan']],
            ['label' => '7 Wonders', 'url' => ['../index.php/site/wonders']],
            ['label' => '3 Popular', 'url' => ['../index.php/site/popular']],

           ],
    ]);
  
    echo Nav::widget([
        'options' => ['class' => 'nav navbar-nav navbar-right '],
        'items' => [
            Yii::$app->user->isGuest ? (
                Html::a('<i class="glyphicon glyphicon-user"></i> Sign Up',['/user/create'], ['class' => 'btn btn-black', 'title' => 'Sign Up'])
            ):(
                ['label' => '', 'url' => ['/site']] 
            )
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'nav navbar-nav navbar-right fixed'],
        'items' =>[
            Yii::$app->user->isGuest ? (
                Html::a('<i class="glyphicon glyphicon-log-in"></i> login',['site/login'], ['class' => 'btn btn-black', 'title' => 'login'])
            ) : (
            
            '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                '<i class="glyphicon glyphicon-log-out"></i> Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-black btn-link logout']
            )
            . Html::endForm()
            . '</li>'
            
            )
        ],
    ]);

    
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

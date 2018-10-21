<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
      
        $rule = new \app\rbac\AuthorRule;
        $auth->add($rule);

    
    }
}
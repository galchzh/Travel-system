<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Feedback;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */

    public function actionContact()
    {
        $model = new Feedback();
        if($model->load(Yii::$app->request->post())&& $model->save())
        {
            Yii::$app->session->setFlash('FeedSubmitted');
            return $this->render('contact',[
                'model' => $model,
            ]);
        } 
        else
        {
            return $this->render('contact',['model' => $model,]);
        }
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionPlan()
    {
        return $this->render('plan');
    }
    public function actionWonders()
    {
        return $this->render('wonders');
    }
    public function actionPopular()
    {
        return $this->render('popular');
    }

    public function actionSearcharticle()
    {
        $term =  $_GET['searchterm']   ;
        $article= Yii::$app->db->createCommand("SELECT * FROM article WHERE (article.title LIKE %".$term."%")->queryAll();
            return $this->render('search', [
            'articles' => $article,
            'term' => $term
        ]);
    }

    public function getToken($token)
	{
		$model=Users::model()->findByAttributes(array('token'=>$token));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        

        public function actionVerToken($token)
        {
            $model=$this->getToken($token);
            if(isset($_POST['Ganti']))
            {
                if($model->token==$_POST['Ganti']['tokenhid']){
                    $model->password=md5($_POST['Ganti']['password']);
                    $model->token="null";
                    $model->save();
                    Yii::app()->user->setFlash('ganti','<b>Password has been successfully changed! please login</b>');
                    $this->redirect('?r=site/login');
                    $this->refresh();
                }
            }
            $this->render('verifikasi',array(
			'model'=>$model,
		));
        }

        
        public function actionForgot()
	{
            $getEmail=$_POST['Lupa']['email'];
            $getModel= Users::model()->findByAttributes(array('email'=>$getEmail));
            if(isset($_POST['Lupa']))
            {
                $getToken=rand(0, 99999);
                $getTime=date("H:i:s");
                $getModel->token=md5($getToken.$getTime);
                $namaPengirim="Owner Jsource Indonesia";
                $emailadmin="fahmi.j@programmer.net";
                $subjek="Reset Password";
                $setpesan="you have successfully reset your password<br/>
                    <a href='http://yourdomain.com/index.php?r=site/vertoken/view&token=".$getModel->token."'>Click Here to Reset Password</a>";
                if($getModel->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($namaPengirim).'?=';
				$subject='=?UTF-8?B?'.base64_encode($subjek).'?=';
				$headers="From: $name <{$emailadmin}>\r\n".
					"Reply-To: {$emailadmin}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/html; charset=UTF-8";
				$getModel->save();
                                Yii::app()->user->setFlash('forgot','link to reset your password has been sent to your email');
				mail($getEmail,$subject,$setpesan,$headers);
				$this->refresh();
			}
                
            }
		$this->render('forgot');
	}



}

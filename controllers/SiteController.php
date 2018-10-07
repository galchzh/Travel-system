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
        $model = new ContactForm();
        if($model->load(Yii::$app->request->post())&& $model->save()) {
            Yii::$app->session->setFlash('contactFormSubmitted');
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

    public function actionFeedback()
    {
        $model = new Feedback();
        if($model->load(Yii::$app->request->post())&& $model->save())
        {
            Yii::$app->session->setFlash('FeedSubmitted');
            return $this->render('feedback',[
                'model' => $model,
            ]);
        } 
        else
        {
            return $this->render('feedback',['model' => $model,]);
        }
    }
    public function actionFeedbackk()
    {
        $model = new Feedback();
        if($model->load(Yii::$app->request->post())&& $model->save())
        {
            Yii::$app->session->setFlash('FeedSubmitted');
            return $this->render('feedbackk',[
                'model' => $model,
            ]);
        } 
        else
        {
            return $this->render('feedbackk',['model' => $model,]);
        }
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



}

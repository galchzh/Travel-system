<?php

namespace app\controllers;

use Yii;
use app\models\Article;
use yii\helpers\Html;
use app\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;


/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['createArticle'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['updateArticle'],
                        'roleParams' => function() {
                            return ['article' => Article::findOne(['id' => Yii::$app->request->get('id')])];
                        },                      
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['admin'],
                    ],                   
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            [
                'class' => BlameableBehavior::className()
            ],
            [
                'class' =>  TimestampBehavior::className(),
            ],
        ];
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
      
        
        if (\Yii::$app->user->can('editor')) {
        $dataProvider->setSort([
            'defaultOrder' => [ 'status' => SORT_ASC],   
       ]);
        }
       else if (\Yii::$app->user->can('author')) {
        $dataProvider->setSort([
        'defaultOrder' => [ 'status' => SORT_DESC],
        ]);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

  

    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $tagModels = $model->tags;

        $model->count = $model->count+1;
        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            if ($model->rate == 0)
            {
                Yii::$app->session->setFlash('RateSubmitted');
                $model->save(false);
                return $this->redirect(['view','id' => $model->id]);
            }
            else {
            Yii::$app->session->setFlash('RateSubmitted');
           $model->sum = $model->sum+$model->rate;
           $model->save(false);
           return $this->redirect(['view','id' => $model->id]);
        }
    }

        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere('article.status = 2');
        $dataProvider->query->andWhere(['!=','article.id',$id]);
        $model1 = Article::findOne($id);
        $dataProvider->query->andFilterWhere(['category_id' => $model1->category_id]);

        $tags = '';
        foreach($tagModels as $tag)
        {
            $tagLink = Html::a($tag->name, ['article/index', 'ArticleSearch[tag]' => $tag->name] );
            $tags .= ','.$tagLink;
        }  

        $tags = substr($tags,1);  

        return $this->render('view', [
            'model' => $this->findModel($id),
            'tags' => $tags,
            'dataProvider' => $dataProvider,
        
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionSearcharticle()
    {
        $term =  $_GET['searchterm']   ;
        $article = Yii::$app->db->createCommand("SELECT * FROM article WHERE (article.title LIKE '%".$term."%'")->queryAll();
            return $this->render('search', [
            'articles' => $article,
            'term' => $term
        ]);
    }

   

    


}

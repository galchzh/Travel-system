<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Article;

/**
 * ArticleSearch represents the model behind the search form of `app\models\Article`.
 */
class ArticleSearch extends Article
{
    /**
     * @inheritdoc
     */

    public $tag;
    public $globalSearch;

    public function rules()
    {
        return [
            [['id', 'author_id', 'editor_id', 'category_id', 'created_by', 'updated_by'], 'integer'],
            [['title', 'description', 'body', 'created_at', 'updated_at','tag','globalSearch'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Article::find();


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

		
		 $query->andFilterWhere([ 
            'id' => $this->id, 
            'author_id' => $this->author_id,
            'editor_id' => $this->editor_id,
            'category_id' => $this->category_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'status' => $this->status,

        ]);
          
        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'body', $this->body]);
   

   
        $query->orFilterWhere(['like', 'title', $this->globalSearch])
        ->orFilterWhere(['like', 'description', $this->globalSearch])
        ->orFilterWhere(['like', 'body', $this->globalSearch])
        ->orFilterWhere(['like', 'category_id', $this->globalSearch]);
      
		
		 $query->andFilterWhere([  'or',
		  ['like', 'status' , !\Yii::$app->user->can('author') ? 2: $this->globalSearch,],
        ['like', 'status' , \Yii::$app->user->can('author') ? 2: $this->globalSearch,],
        ['like', 'status' , \Yii::$app->user->can('author') ? 3: $this->globalSearch,],
        ['like', 'status' , \Yii::$app->user->can('editor') ? 1: $this->globalSearch,],
		]);
		
		

        //Add tags condition
        
        if(!empty($this->tag))
        {
           $condition = Tag::find()
                    ->select('id')
                    ->where(['IN', 'name', $this->tag]);
            $query->joinWith('tags');
            $query->andWhere(['IN', 'tag_id', $condition]);

        }

   
        return $dataProvider;
    }
}

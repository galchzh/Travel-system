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
        // bypass scenarios() implementation in the parent class
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

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
           // 'author_id' => $this->author_id,
           // 'editor_id' => $this->editor_id,
           // 'category_id' => $this->category_id,
          //  'created_at' => $this->created_at,
           // 'updated_at' => $this->updated_at,
          //  'created_by' => $this->created_by,
          //  'updated_by' => $this->updated_by,
            
        ]);

        $query->andFilterWhere([
            'or',
        ['like', 'title' , $this->globalSearch],
        ['like', 'description' , $this->globalSearch],
        ['like', 'body' , $this->globalSearch],
        ['like', 'status' , !\Yii::$app->user->can('author') ? 2: $this->globalSearch,],
        ['like', 'status' , \Yii::$app->user->can('author') ? 2: $this->globalSearch,],
        ['like', 'status' , \Yii::$app->user->can('author') ? 3: $this->globalSearch,],
        ['like', 'status' , \Yii::$app->user->can('editor') ? 1: $this->globalSearch,],
        ['like', 'category_id' , $this->globalSearch],
        ['like', 'editor_id' , $this->globalSearch],
        ['like', 'created_at' , $this->globalSearch],
        ['like', 'updated_at' , $this->globalSearch],
        ['like', 'created_by' , $this->globalSearch],
        ['like', 'updated_by' , $this->globalSearch],
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

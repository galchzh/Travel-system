<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Rating;

/**
 * RatingSearch represents the model behind the search form of `app\models\Rating`.
 */
class RatingSearch extends Rating
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'articleId', 'rate', 'authorId', 'vote_count', 'vote_sum'], 'integer'],
            [['vote_average'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Rating::find();

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
            'articleId' => $this->articleId,
            'rate' => $this->rate,
            'authorId' => $this->authorId,
            'vote_count' => $this->vote_count,
            'vote_sum' => $this->vote_sum,
        ]);

        $query->andFilterWhere(['like', 'vote_average', $this->vote_average]);

        return $dataProvider;
    }
}

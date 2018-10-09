<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rating".
 *
 * @property int $id
 * @property int $articleId
 * @property int $rate
 * @property int $authorId
 * @property int $vote_count
 * @property string $vote_average
 * @property int $vote_sum
 *
 * @property Article[] $articles
 */
class Rating extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['articleId', 'rate', 'authorId', 'vote_count', 'vote_sum'], 'integer'],
            [['vote_average'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'articleId' => 'Article ID',
            'rate' => 'Rate',
            'authorId' => 'Author ID',
            'vote_count' => 'Vote Count',
            'vote_average' => 'Vote Average',
            'vote_sum' => 'Vote Sum',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['rating_id' => 'id']);
    }
}

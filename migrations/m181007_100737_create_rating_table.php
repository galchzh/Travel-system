<?php

use yii\db\Migration;

/**
 * Handles the creation of table `rating`.
 */
class m181007_100737_create_rating_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('rating', [
            'id' => $this->primaryKey(),
            'articleId' => $this->integer(),
            'rate' => $this->integer(),
            'authorId' => $this->integer(),
            'vote_count' => $this->integer(),
            'vote_average' => $this->string(),
            'vote_sum' => $this->integer(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('rating');
    }
}

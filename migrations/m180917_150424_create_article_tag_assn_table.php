<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article_tag_assn`.
 */
class m180917_150424_create_article_tag_assn_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('article_tag_assn', [
            'article_id' => $this->integer(),
            'tag_id' => $this->integer(),
            'PRIMARY KEY(article_id, tag_id)'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('article_tag_assn');
    }
}

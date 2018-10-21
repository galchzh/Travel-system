<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article`.
 */
class m181007_182846_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
              $this->createTable('article', [
           'id' => $this->primaryKey(),
           'title' => $this->string(),
           'description' => $this->string(),
           'status' => $this->integer(),
           'body' => $this->text(),
           'author_id' => $this->integer(),
           'editor_id' => $this->integer(),
           'category_id' => $this->integer(),
           'created_at' => $this->integer(),
           'updated_at' => $this->integer(),
           'created_by' => $this->integer(),
           'updated_by' => $this->integer(),
           'rate' => $this->double(),
           'sum' => $this->double(),
           'count' => $this->integer(),
       ]);


      
      
      

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('article');



       
    }
}

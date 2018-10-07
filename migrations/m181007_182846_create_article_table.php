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
           'rating_id' => $this->integer(),
           'body' => $this->text(),
           'author_id' => $this->integer(),
           'editor_id' => $this->integer(),
           'category_id' => $this->integer(),
           'created_at' => $this->integer(),
           'updated_at' => $this->integer(),
           'created_by' => $this->integer(),
           'updated_by' => $this->integer(),
       ]);


      $this->addForeignKey(
        'fk-product-author_id',
        'article',
        'author_id',
        'user',
        'id'
    );
    $this->addForeignKey(
        'fk-product-editor_id',
        'article',
        'editor_id',
        'user',
        'id'
    );
    $this->addForeignKey(
        'fk-product-created_by',
        'article',
        'created_by',
        'user',
        'id'
    );
    $this->addForeignKey(
        'fk-product-updated_by',
        'article',
        'updated_by',
        'user',
        'id'
      );
      
      $this->addForeignKey(
         'fk-rating-rating_id',
         'article',
         'rating_id',
         'rating',
         'id'
     );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('article');



       $this->dropForeignKey(
           'fk-product-author_id',
           'user'
       );
       $this->dropForeignKey(
           'fk-product-editor_id',
           'user'
       ); 
       $this->dropForeignKey(
           'fk-product-created_by',
           'user'
       ); 
       $this->dropForeignKey(
           'fk-product-updated_by',
           'user'
       ); 
       $this->dropForeignKey(
        'fk-rating-rating_id',
        'rating'
    );         
    }
}

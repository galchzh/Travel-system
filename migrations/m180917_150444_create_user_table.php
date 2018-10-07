<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180917_150444_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $this->createTable('user', [
           'id' => $this->primaryKey(),
           'name'=> $this->string(),
           'email' => $this->string(),
           'username' => $this->string()->unique(),
           'auth_key' => $this->string(),
           'password' => $this->string(),
           'created_at' => $this->timestamp(),
           'updated_at' => $this->timestamp(),
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
        'id' );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');

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
    } 
}

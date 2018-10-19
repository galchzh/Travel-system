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

       
      

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');

       
    } 
}

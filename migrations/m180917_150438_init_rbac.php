<?php

use yii\db\Migration;

/**
 * Class m180917_150438_init_rbac
 */
class m180917_150438_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $author = $auth->createRole('author');
        $auth->add($author);
  
        $admin = $auth->createRole('admin');
        $auth->add($admin);
                
        $auth->addChild($admin, $author);
  
        $manageUsers = $auth->createPermission('manageUsers');
        $auth->add($manageUsers);
  
        $updateArticle = $auth->createPermission('updateArticle');
        $auth->add($updateArticle);                    
                
        $updateOwnArticle = $auth->createPermission('updateOwnArticle');
  
        $rule = new \app\rbac\AuthorRule;
        $auth->add($rule);
                
        $updateOwnArticle->ruleName = $rule->name;                
        $auth->add($updateOwnArticle);                 
                                  
                
        $auth->addChild($admin, $manageUsers);
        $auth->addChild($updateOwnArticle, $updateArticle);
        $auth->addChild($author, $updateOwnArticle); 
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180917_150438_init_rbac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180917_150438_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}

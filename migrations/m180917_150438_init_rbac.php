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

        $editor = $auth->createRole('editor');
        $auth->add($editor);
  
        $admin = $auth->createRole('admin');
        $auth->add($admin);
                
        $auth->addChild($admin, $editor);
        $auth->addChild($editor, $author);
  
        $manageUsers = $auth->createPermission('manageUsers');
        $auth->add($manageUsers);

        $createArticle = $auth->createPermission('createArticle');
        $auth->add($createArticle); 
  
        $updateArticle = $auth->createPermission('updateArticle');
        $auth->add($updateArticle);  
        
        $updateStatus = $auth->createPermission('updateStatus');
        $auth->add($updateStatus);
                
        $updateOwnArticle = $auth->createPermission('updateOwnArticle');
  
        $rule = new \app\rbac\AuthorRule;
        $auth->add($rule);
                
        $updateOwnArticle->ruleName = $rule->name;                
        $auth->add($updateOwnArticle);                 
                                  
                
        $auth->addChild($admin, $manageUsers);
        $auth->addChild($author, $createArticle);
        $auth->addChild($editor, $updateStatus);
        $auth->addChild($editor, $updateArticle);
        $auth->addChild($author, $updateOwnArticle); 
        $auth->addChild($updateOwnArticle, $updateArticle);
       
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

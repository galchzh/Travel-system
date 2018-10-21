<?php

use yii\db\Migration;

/**
 * Handles the creation of table `status`.
 */
class m181007_141503_create_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('status', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);

        {
            $this->insert('status', [
                'name' => 'draft',
            ]);
    
            $this->insert('status', [
                'name' => 'publish',
            ]);
    
            $this->insert('status', [
                'name' => 'edit',
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('status');
    }
}

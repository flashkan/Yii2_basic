<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m191128_223957_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'firstName' => $this->string(),
            'lastName' => $this->string(),
            'birthday' => $this->date(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'create_at' => $this->date(),
            'update_at' => $this->date()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%activity}}`.
 */
class m191128_221043_create_activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%activity}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'startDay' => $this->integer(),
            'endDay' => $this->integer(),
            'idAuthor' => $this->integer(),
            'body' => $this->string(),
            'repetition' => $this->boolean(),
            'block' => $this->boolean(),
            'create_at' => $this->integer(),
            'update_at' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%activity}}');
    }
}

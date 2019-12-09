<?php

use yii\db\Migration;

/**
 * Handles the creation of table `calendar`.
 */
class m191128_234420_create_calendar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('calendar', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer(),
            'id_activity' => $this->integer(),
            'create_at' => $this->date(),
            'update_at' => $this->date()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('calendar');
    }
}

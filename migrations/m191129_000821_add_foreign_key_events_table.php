<?php

use yii\db\Migration;

/**
 * Class m191129_000821_add_foreign_key_events_table
 */
class m191129_000821_add_foreign_key_events_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('events_users_key', 'events', 'id_user', 'users', 'id');
        $this->addForeignKey('events_activity_key', 'events', 'id_activity', 'activity', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('events_users_key', 'events');
        $this->dropForeignKey('events_activity_key', 'events');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191129_000821_add_foreign_key_events_table cannot be reverted.\n";

        return false;
    }
    */
}

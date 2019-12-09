<?php

use yii\db\Migration;

/**
 * Class m191129_000821_add_foreign_key_calendar_table
 */
class m191129_000821_add_foreign_key_calendar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('calendar_user_key', 'calendar', 'id_user', 'user', 'id');
        $this->addForeignKey('calendar_activity_key', 'calendar', 'id_activity', 'activity', 'id');
        $this->addForeignKey('activity_auth_key', 'activity', 'idAuthor', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('calendar_user_key', 'calendar');
        $this->dropForeignKey('calendar_activity_key', 'calendar');
        $this->dropForeignKey('activity_auth_key', 'activity');
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

<?php

use yii\db\Migration;

/**
 * Class m191128_235922_add_events_table
 */
class m191128_235922_add_events_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->db->createCommand()->batchInsert('events',
            ['id', 'id_user', 'id_activity', 'create_at', 'update_at'], [
                [1, 1, 1, date(time()), date(time())],
                [2, 2, 2, date(time()), date(time())],
                [3, 3, 3, date(time()), date(time())],
                [4, 4, 4, date(time()), date(time())],
                [5, 5, 5, date(time()), date(time())],
                [6, 6, 1, date(time()), date(time())],
                [7, 7, 2, date(time()), date(time())],
                [8, 8, 3, date(time()), date(time())],
                [9, 9, 4, date(time()), date(time())],
                [10, 10, 5, date(time()), date(time())]
            ])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Yii::$app->db->createCommand('DELETE FROM activity WHERE id IN (1, 2, 3, 4, 5, 6, 7, 8, 9, 10);')->execute();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191128_235922_add_events_table cannot be reverted.\n";

        return false;
    }
    */
}

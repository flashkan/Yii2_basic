<?php

use yii\db\Migration;

/**
 * Class m191128_224730_add_activity_table
 */
class m191128_224730_add_activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->db->createCommand()->batchInsert('activity',
            ['id', 'title', 'startDay', 'endDay', 'idAuthor', 'body', 'repetition', 'block'], [
                [1, 'Doctor', date(time()), date(time()), 1, 'Go to Doctor', true, false],
                [2, 'Party', date(time()), date(time()), 1, 'Go to Party', true, true],
                [3, 'Meeting', date(time()), date(time()), 1, 'Go to Meeting', false, false],
                [4, 'Hike', date(time()), date(time()), 1, 'Go to doctor', false, true],
                [5, 'Departure', date(time()), date(time()), 1, 'Go to doctor', false, true]
            ])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Yii::$app->db->createCommand('DELETE FROM activity WHERE id IN (1, 2, 3, 4, 5);')->execute();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191128_224730_add_activity_table cannot be reverted.\n";

        return false;
    }
    */
}

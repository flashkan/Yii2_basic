<?php

use yii\db\Migration;

/**
 * Class m191128_224748_add_users_table
 */
class m191128_224748_add_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->db->createCommand()->batchInsert('users',
            ['id','firstName', 'lastName', 'birthday', 'phone', 'email', 'create_at', 'update_at'], [
            [1, 'John', 'Asd', date(time()), '98798797', 'email@email.com', time(), time()],
            [2, 'Tik', 'Asd', date(time()), '98798797', 'email@email.com', time(), time()],
            [3, 'Kik', 'Asd', date(time()), '98798797', 'email@email.com', time(), time()],
            [4, 'Tok', 'Asd', date(time()), '98798797', 'email@email.com', time(), time()],
            [5, 'Hok', 'Asd', date(time()), '98798797', 'email@email.com', time(), time()],
            [6, 'Doc', 'Asd', date(time()), '98798797', 'email@email.com', time(), time()],
            [7, 'Tak', 'Asd', date(time()), '98798797', 'email@email.com', time(), time()],
            [8, 'Hak', 'Asd', date(time()), '98798797', 'email@email.com', time(), time()],
            [9, 'Dak', 'Asd', date(time()), '98798797', 'email@email.com', time(), time()],
            [10, 'Mak', 'Asd', date(time()), '98798797', 'email@email.com', time(), time()]
        ])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        Yii::$app->db->createCommand('DELETE FROM users WHERE id IN (1, 2, 3, 4, 5, 6, 7, 8, 9, 10);')->execute();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191128_224748_add_users_table cannot be reverted.\n";

        return false;
    }
    */
}

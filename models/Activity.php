<?php

namespace app\models;

use Codeception\Events;
use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property string $title
 * @property string $startDay
 * @property string $endDay
 * @property int $idAuthor
 * @property string $body
 * @property int $repetition
 * @property int $block
 * @property string $create_at
 * @property string $update_at
 *
 * @property Events[] $events
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'startDay', 'idAuthor'], 'required'],
            [['startDay', 'endDay', 'create_at', 'update_at'], 'safe'],
            [['idAuthor', 'repetition', 'block'], 'integer'],
            [['title', 'body'], 'string', 'max' => 255],
            [['endDay'], 'default', 'value' => function ($model) {
                return $model->endDay = $model->startDay;
            }],
            [['endDay'], 'checkDate'],

        ];
    }

    /**
     * Проверяет, что бы дата завершения была позже даты начала.
     * В противном случае устанавливает дату завершения равной дате начала.
     */
    public function checkDate() {
        $timeStart = strtotime($this->startDay);
        $timeEnd = strtotime($this->endDay);
        if ($timeStart > $timeEnd) $this->addError('endDay', 'End date must be more or equal start date');
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'startDay' => 'Start Day',
            'endDay' => 'End Day',
            'idAuthor' => 'Id Author',
            'body' => 'Body',
            'repetition' => 'Repetition',
            'block' => 'Block',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Events::className(), ['id_activity' => 'id']);
    }


}

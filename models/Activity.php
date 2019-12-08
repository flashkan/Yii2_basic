<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

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
 * @property User $author
 * @property Users[] $users
 * @property Calendar[] $calendars
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
            [['title', 'startDay'], 'required'],
            [['create_at', 'update_at'], 'safe'],
            [['idAuthor', 'repetition', 'block'], 'integer'],
            [['repetition', 'block'], 'default', 'value' => 0],
            [['title', 'body'], 'string', 'max' => 255],
            [['idAuthor'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idAuthor' => 'id']],
            ['idAuthor', 'default', 'value' => \Yii::$app->getUser()->id],
            [['endDay'], 'default', 'value' => function ($model) {
                return $model->endDay = $model->startDay;
            }],
            [['endDay'], 'checkDate'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'startDay' => 'Дата и время начала',
            'endDay' => 'Дата и время окончания',
            'idAuthor' => 'Автор',
            'body' => 'Описание',
            'repetition' => 'Повторяющееся',
            'block' => 'Блокирующее',
            'create_at' => 'Дата создания',
            'update_at' => 'Дата изменения',
            'authorEmail' => 'Email Автора',
        ];
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_at',
                'updatedAtAttribute' => 'update_at',
                'value' => time(),
            ]
        ];
    }

    /**
     * Проверяет, что бы дата завершения была позже даты начала.
     * В противном случае устанавливает дату завершения равной дате начала.
     */
    public function checkDate()
    {
        $this->startDay = strtotime($this->startDay);
        $this->endDay = strtotime($this->endDay);
        if ($this->startDay > $this->endDay) $this->addError('endDay', 'End date must be more or equal start date');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'idAuthor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendars()
    {
        return $this->hasMany(Calendar::className(), ['id_activity' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public function getUsers()
    {
//        return $this->hasMany(User::className(), ['id' => 'id_user'])->via('calendar');
        return $this->hasMany(User::className(), ['id' => 'id_user'])->viaTable('calendar', ['id_activity' => 'id']);
    }
}

<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Calendar;

/**
 * CalendarSearch represents the model behind the search form of `app\models\Calendar`.
 */
class CalendarSearch extends Calendar
{
    public $start;
    public $end;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'start', 'end'], 'integer'],
        ];
    }

    public function afterValidate()
    {
        $this->start = (int) \Yii::$app->formatter->asTimestamp($this->start);
        $this->end = (int) \Yii::$app->formatter->asTimestamp($this->end);
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Calendar::find()
            ->joinWith('activities')
            ->andWhere(['calendar.user_id' => \Yii::$app->user->id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params, '');
        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }
        $query->andWhere([
            'or',
            ['between', 'activity.finished_at', $this->start, $this->end],
            ['between', 'activity.started_at', $this->start, $this->end],
        ]);
        return $dataProvider;

    }
}

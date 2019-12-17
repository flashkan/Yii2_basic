<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Activity;

/**
 * ActivitySearch represents the model behind the search form of `app\models\Activity`.
 */
class ActivitySearch extends Activity
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idAuthor', 'repetition', 'block'], 'integer'],
            [['title', 'body', 'create_at', 'update_at'], 'safe'],
            ['authorEmail', 'string'],
            [['startDay', 'endDay'], 'date'],
        ];
    }

    public $authorEmail;

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
        if (\Yii::$app->user->can('admin')) {
            $query = Activity::find();
        } else {
            $query = Activity::find()->where(['idAuthor' => \Yii::$app->user->id]);
        }

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        if (!empty($this->startDay)) {
            $this->filterByDate('startDay', $query);
        }

        if (!empty($this->endDay)) {
            $this->filterByDate('endDay', $query);
        }

        if (!empty($this->authorEmail)) {
            $query->joinWith('author');
            $query->andWhere(['like', 'user.email', $this->authorEmail]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
//            'startDay' => $this->startDay,
//            'endDay' => $this->endDay,
            'idAuthor' => $this->idAuthor,
            'repetition' => $this->repetition,
            'block' => $this->block,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'body', $this->body]);

        return $dataProvider;
    }

    /**
     * @param $attr
     * @param $query
     */
    public function filterByDate($attr, $query)
    {
        $dayStart = \Yii::$app->formatter->asTimestamp($this->$attr . ' 00:00:00');
        $endStart = \Yii::$app->formatter->asTimestamp($this->$attr . ' 23:59:59');
        $query->andFilterWhere([
            'between',
            self::tableName() . ".$attr",
            $dayStart,
            $endStart,
        ]);
    }
}

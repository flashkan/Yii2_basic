<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Activities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Activity', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'title',
            [
                'attribute' => 'startDay',
                'filter' => \kartik\date\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'startDay',
                    'language' => 'ru',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'todayHighlight' => true,
                        'format' => 'dd.mm.yyyy',
                    ],
                ]),
                'value' => function (\app\models\Activity $model) {
                    return Yii::$app->formatter->asDatetime($model->startDay);
                }
            ],
            [
                'attribute' => 'endDay',
                'filter' => \kartik\date\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'endDay',
                    'language' => 'ru',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'todayHighlight' => true,
                        'format' => 'dd.mm.yyyy',
                    ],
                ]),
                'value' => function (\app\models\Activity $model) {
                    return Yii::$app->formatter->asDatetime($model->endDay);
                }
            ],
            'idAuthor',
            'body',
            'repetition:boolean',
            'block:boolean',
            [
                'attribute' => 'authorEmail',
                'format' => 'raw',
                'value' => function (\app\models\Activity $model) {
                    return Html::a($model->author->email, ['/user/view', 'id' => $model->author->id]);
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); ?>


</div>

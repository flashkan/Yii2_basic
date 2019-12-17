<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel app\models\search\ActivitySearch */

$this->title = $model->username;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

//var_dump($model->);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete'], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

    <p>
        <?= Html::a('Create Activity', ['..\activity\create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'title',
            'idAuthor',
            'body',
            'repetition:boolean',
            'block:boolean',
            'startDay',
            'endDay',
            [
                'attribute' => 'authorEmail',
                'format' => 'raw',
                'value' => function (\app\models\Activity $model) {
                    return Html::a($model->author->email, ['/user/view', 'id' => $model->author->id]);
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'activity'
            ],

        ],
    ]); ?>

</div>

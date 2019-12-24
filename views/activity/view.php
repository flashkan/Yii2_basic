<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */

$this->title = $model->title;
if (\Yii::$app->user->can('admin')) {
    $this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
} else {
    $this->params['breadcrumbs'][] = ['label' => 'Personal Account', 'url' => '\profile\index'];
}

$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
//var_dump($model->attributes);
//foreach ($model->users as $user) {
//    var_dump($user->attributes);
//}
?>
<div class="activity-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'title',
            'startDay:datetime',
            'endDay:datetime',
            'idAuthor',
            'body',
            'repetition:boolean',
            'block:boolean',
            'create_at:datetime',
            'update_at:datetime',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $action app\models\User */
/* @var $dataProvider yii\data\ActiveDataProvider */

$isPersonalAccount = \Yii::$app->requestedAction->id === 'personal-account';
$this->title = $model->username;
if (!$isPersonalAccount) {
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
}
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

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
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'status',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

    <?php
    if ($isPersonalAccount) {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
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
                ['class' => 'yii\grid\ActionColumn'],
        ],
        ]);
    }
    ?>



</div>

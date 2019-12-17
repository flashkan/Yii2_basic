<?php

use yii\helpers\Html;
use app\assets\CalendarAsset;

CalendarAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CalendarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Calendars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendar-index">
    <div class="calendar-index">
        <h1><?= Html::encode($this->title) ?></h1>
        <?= edofre\fullcalendar\Fullcalendar::widget([
            'events' => \yii\helpers\Url::to(['calendar/events', 'id' => uniqid()]),
        ]); ?>
    </div>
</div>

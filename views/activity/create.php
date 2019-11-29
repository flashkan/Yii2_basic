<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */
/* @var $form ActiveForm */
?>
<div class="activity-create">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title') ?>
    <?= $form->field($model, 'idAuthor') ?>
    <?= $form->field($model, 'body') ?>
    <?= $form->field($model, 'repetition')->checkbox() ?>
    <?= $form->field($model, 'block')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- activity-create -->

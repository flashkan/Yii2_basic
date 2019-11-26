<h1>Активность: <?=$model->title; ?></h1>

<?php if($model->startDay == $model->endDay): ?>
    <p>Событие на <?=date("d.m.Y", $model->startDay)?></p>
<?php else: ?>
    <p>Событие c <?=date("d.m.Y", $model->startDay)?> по <?=date("d.m.Y", $model->endDay)?></p>
<?php endif; ?>
<p><?=$model->getAttributeLabel('repetition')?>:</p>
<p><?=$model->getAttributeLabel('block')?>:</p>
<h3><?=$model->getAttributeLabel('body') ?></h3>
<div><?=$model->body ?></div>

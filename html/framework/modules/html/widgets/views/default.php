<?php
/* @var $model tina\html\models\Html */
?>
<?php if ($model->title): ?>
    <h2><?= $model->title; ?></h2>
<?php endif; ?>
<?php if ($model->text): ?>
    <?= $model->text; ?>
<?php endif; ?>

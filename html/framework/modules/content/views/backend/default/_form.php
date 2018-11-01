<?php

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\modules\content\models\Content */
?>

<?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'text')->widget(
    Yii::createObject([
        'class' => \krok\editor\interfaces\EditorInterface::class,
        'model' => $model,
        'attribute' => 'text',
    ])
) ?>

<?= $form->field($model, 'hideContent')->dropDownList($model::getHideContentList()) ?>

<?= $form->field($model, 'layout')->hiddenInput(['value' => '//common'])->label(false) ?>

<?= $form->field($model, 'view')->dropDownList($model::getViews()) ?>

<?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'hasFrame')->dropDownList($model::getHasFrameList()) ?>

<?= $form->field($model, 'frameLink')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'frameHeight')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'hidden')->dropDownList($model::getHiddenList()) ?>

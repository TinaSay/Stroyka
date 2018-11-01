<?php

use app\modules\news\models\News;
use app\modules\news\models\NewsGroup;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\modules\news\models\News */

$model->date = (is_null($model->date) ? date('Y-m-d') : $model->date);
?>

<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'group')->dropDownList(NewsGroup::getList()) ?>

<?= $form->field($model, 'src')->fileInput(['accept' => 'image/*']) ?>

<?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'text')->widget(
    Yii::createObject([
        'class' => \krok\editor\interfaces\EditorInterface::class,
        'model' => $model,
        'attribute' => 'text',
    ])
) ?>

<?= $form->field($model, 'date')->widget(
    DatePicker::class, [
    'dateFormat' => 'php:Y-m-d',
    'options' => [
        'class' => 'form-control',
    ],
]) ?>

<?= $form->field($model, 'hidden')->dropDownList(News::getHiddenList()) ?>

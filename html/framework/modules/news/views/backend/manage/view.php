<?php

use tina\metatag\widgets\backend\MetatagViewWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\news\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('system', 'News'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">

    <div class="card-header">
        <h4 class="card-title"><?= Html::encode($this->title) ?></h4>
    </div>

    <div class="card-header">
        <p>
            <?= Html::a(Yii::t('system', 'Update'), ['update', 'id' => $model->id], [
                'class' => 'btn btn-primary',
            ]) ?>
            <?= Html::a(Yii::t('system', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('system', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>

    <div class="card-content">

        <?= DetailView::widget([
            'options' => ['class' => 'table'],
            'model' => $model,
            'attributes' => [
                'id',
                'title',
                [
                    'attribute' => 'group',
                    'value' => ArrayHelper::getValue($model, 'groupRelation.title', ''),
                ],
                [
                    'attribute' => 'src',
                    'format' => 'raw',
                    'value' => Html::img($model->getMainWidgetImage()),
                ],
                'text:html',
                'date:date',
                [
                    'attribute' => 'hidden',
                    'value' => $model->getHidden(),
                ],

                'createdAt:datetime',
                'updatedAt:datetime',
            ],
        ]) ?>

    </div>


</div>

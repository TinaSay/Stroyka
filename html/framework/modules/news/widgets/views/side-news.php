<?php

use app\modules\news\models\News;

/** @var $this \yii\web\View */
/* @var $newslist News[] */
/* @var $className string */
?>

<div class="news-feed-block">
    <div class="most-imp-card">
        Главное за неделю
    </div>

    <?php foreach ($newslist as $model) : ?>
        <a href="<?= \yii\helpers\Url::to(['/news/news/view', 'id' => $model->id]) ?>" class="news-feed-card">
            <div class="card-news__text"><?= $model->title ?></div>
            <div class="card-news__foot">
                <div class="news-foot">
                    <span class="news-foot__look"><?= Yii::$app->getFormatter()->asDate($model->date, 'long'); ?></span>
                    <span class="news-foot__info">
                        <!--
                        <span><i class="icon-message"></i>0</span>
                          <span><i class="icon-look"></i>120</span>
                          -->
                        </span>
                </div>
            </div>
        </a>
    <?php endforeach; ?>

    <a href="<?= \yii\helpers\Url::to(['/news/news']) ?>" class="btn btn-border">Все новости</a>
</div>



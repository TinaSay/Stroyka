<?php

use app\modules\news\models\News;

/** @var $this \yii\web\View */
/* @var $newslist News[] */
/* @var $className string */
?>

<?php foreach ($newslist as $model) : ?>
    <div class="col-xs-12 col-sm-6 col-lg-3 mr-base">
        <div class="card-news">
            <div class="sheare-list-wrap">
                <div class="sheare-btn">
                    <i class="icon-sheare"></i>
                </div>
                <ul class="sheare-list">
                    <li class="sheare-ell">
                        <a href="#">
                            <i class="icon-vkontact"></i>
                        </a>
                    </li>
                    <li class="sheare-ell">
                        <a href="#">
                            <i class="icon-facebook"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <a href="<?= \yii\helpers\Url::to(['/news/news/view', 'id' => $model->id]) ?>" class="card-news__link">
                <div class="card-news__image"
                     style="background-image: url('<?= Yii::$app->getUrlManager()->getBaseUrl() ?><?= ($model->getMainWidgetImage() ? $model->getMainWidgetImage() : '/static/stroy/img/fish/news_1.jpg') ?>');">
                    <div class="card-news__image-bg"></div>
                </div>
                <div class="card-news__text"><?= $model->title ?></div>
                <div class="card-news__foot">
                    <div class="news-foot">
                        <span class="news-foot__look"><?= Yii::$app->formatter->asDate($model->date, 'medium') ?></span>
                        <span class="news-foot__info">

                        </span>
                    </div>
                </div>
            </a>
        </div>
    </div>

<?php endforeach; ?>

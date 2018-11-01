<?php


/* @var $this yii\web\View */

/* @var $model app\modules\news\models\News */

use app\modules\news\models\Subscribe;
use app\modules\news\widgets\NewsSubscribeWidget;
use yii\helpers\Url;

/** @var \app\modules\news\models\News $model */
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => Url::to(['/news/news'])];
?>

<section class="section-st-con bg-gray">
    <div class="container">
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <div class="card-content content-base">
                        <div class="rating-block">
                            <div class="date"><?= Yii::$app->getFormatter()->asDate($model->date, 'long'); ?></div>
                            <!--
                            <div class="rating-ell rating-active">
                                <input type="hidden" name="val" value="5"/>
                                <input type="hidden" name="votes" value="15"/>
                                <input type="hidden" name="vote-id" value="3"/>
                                <input type="hidden" name="cat_id" value="2"/>
                            </div>
                            -->
                        </div>
                        <?php if ($model->getMainWidgetImage()): ?>
                            <div class="img-wrap">
                                <img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?><?= ($model->getMainWidgetImage() ? $model->getMainWidgetImage() : '/static/stroy/img/fish/news_1.jpg') ?>">
                            </div>
                        <?php endif; ?>

                        <p><?= $model->text ?></p>

                        <div class="card-content-foot">
                            <ul class="foot-social">
                                <li>
                                    <a href="#"><i class="icon-vkontact"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-facebook"></i></a>
                                </li>
                            </ul>
                            <div class="foot-info">
                                <!--
                                <span><i class="icon-message"></i>0</span>
                                <span><i class="icon-look"></i>120</span>
                                -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-4">

                    <?= \app\modules\news\widgets\SideNewsWidget::widget() ?>


                    <div class="subscription-block">
                        <div class="mail-icon">
                            <span class="mail-num">1</span>
                            <img src="<?= Yii::$app->getUrlManager()->baseUrl ?>/static/stroy/img/mail.svg">
                        </div>
                        <h4 class="subscription-block__header">Подпишись <br>на рассылку</h4>
                        <p class="subscription-block__text">Оставайтесь в курсе последних событий портала</p>
                        <form class="subscription-block__form">
                            <input class="subscription-input" type="text" id="subscribe-email" name="email"
                                   placeholder="Введите Ваш e-mail">
                            <button type="submit" class="btn btn-prime">ОТПРАВИТЬ</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>




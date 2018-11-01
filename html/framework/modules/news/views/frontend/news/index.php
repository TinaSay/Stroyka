<?php

/* @var $this yii\web\View */

/* @var $topNewslist \app\modules\news\models\News[] */
/* @var $bottomNewslist \app\modules\news\models\News[] */

/* @var $pagination \yii\data\Pagination */


use app\modules\news\widgets\NewsPager;
use app\modules\news\widgets\NewsWidget;
use yii\widgets\ActiveForm;

$this->title = 'Новости';

?>

<section class="section-st-con bg-gray">
    <div class="container">
        <div class="card-st-head card-st content-base">
            <?php $form = ActiveForm::begin([
                'method' => 'get',
                'action' => \yii\helpers\Url::to(['/news/news']),
                'options' => ['class' => 'filter-form news-filter-form']]); ?>
            <h4 class="form-name">Поиск новости</h4>
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <div class="faild-wrap faild-seach">
                        <?=
                        $form->field($modelSearch, 'title', [
                            'template' => '<div class="faild-wrap faild-seach">{input}<i class="icon-seach"></i></div><div class="">{error}</div>'
                        ])->textInput([
                            'class' => 'faild-base',
                            'id' => "news-search-term",
                            'name' => 'term',
                            'placeholder' => "Введите ключевые слова поиска",
                            'value' => Yii::$app->request->get('term')
                        ]) ?>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="faild-wrap faild-icon">
                                <input class="faild-base date-start" type="text" id="news-dateFrom" name="dateFrom"
                                       placeholder="От" value="<?= Yii::$app->request->get('dateFrom') ?>">
                                <i class="icon-calendar"></i>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="faild-wrap faild-icon">
                                <input class="faild-base date-end" type="text" id="news-dateTo" name="dateTo"
                                       placeholder="До" value="<?= Yii::$app->request->get('dateTo') ?>">
                                <i class="icon-calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="btn btn-prime news-search-submit-btn">Показать</div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="btn btn-border news-search-reset-btn">Сбросить</div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="filter" value="1">
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <div class="container">
        <p class="seach-result">Показано
            новостей <?= ($pagination->totalCount > $pagination->pageSize) ? $pagination->pageSize : $pagination->totalCount ?>
            из <?= $pagination->totalCount ?></p>
        <div class="sv-news">
            <div class="row">

                <?= NewsWidget::widget([
                    'newslist' => $topNewslist,
                ]); ?>


                <div class="col-xs-12 mr-base">
                    <div class="subscription-block-full">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="block-cont">
                                    <div class="mail-icon">
                                        <span class="mail-num">1</span>
                                        <img src="<?= Yii::$app->getUrlManager()->baseUrl ?>/static/stroy/img/mail.svg">
                                    </div>
                                    <h4 class="subscription-block-full__header">Подпишись на рассылку</h4>
                                    <p class="subscription-block-full__text">Оставайтесь в курсе последних событий
                                        портала</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="block-form">
                                    <form class="subscription-block-full__form">
                                        <input class="subscription-input" type="text" id="subscribe-email" name="email"
                                               placeholder="Введите Ваш e-mail">
                                        <button type="submit" class="btn btn-prime">ОТПРАВИТЬ</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <?= NewsWidget::widget([
                    'newslist' => $bottomNewslist,
                ]); ?>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-sm-push-8 col-md-3 col-md-push-9">
                <!-- <a href="#" class="btn btn-border btn-full">Показать еще</a> -->
            </div>
            <div class="col-xs-12 col-sm-8 col-sm-pull-4 col-md-9 col-md-pull-3">
                <div class="pagination-block">

                    <?= NewsPager::widget([
                        'pagination' => $pagination,
                        'prevPageLabel' => '<i class="icon-arr-left"></i>',
                        'nextPageLabel' => '<i class="icon-arr-right"></i>',
                        'disableCurrentPageButton' => true,
                        'nextPageCssClass' => 'next-ell',
                        'prevPageCssClass' => 'prev-ell',
                        'hideOnSinglePage' => true,
                        'options' => [
                            'class' => 'pagination-list',
                        ]
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</section>


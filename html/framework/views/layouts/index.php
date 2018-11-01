<?php

use app\assets\AppAsset;
use tina\html\widgets\HtmlWidget;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
$baseUrl = Yii::$app->getUrlManager()->getBaseUrl();

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

<body>
<main class="main-page">
    <section class="section-sv-top">
        <div class="sv-nav">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="svarka-logo">
                            <img src="<?= $baseUrl ?>/static/stroy/img/logo_st.png">
                            <h3 class="svarka-logo__header">Строительные<br/>материалы</h3>
                            <p class="svarka-logo__header-sub">Отраслевой портал</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-8">
                        <div class="about-modal">О чем портал?</div>
                        <div class="nav-wrap">
                            <?= \elfuvo\menu\widgets\MenuWidget::widget([
                                'section' => 'top', // if sections is enabled
                                'view' => '@app/modules/menu/widgets/views/topMenu',
                            ]); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sv-filter">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-lg-7">
                        <div class="filter-block">
                            <form class="filter-form">
                                <h4 class="form-name">Поиск по порталу</h4>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="faild-wrap faild-seach">
                                            <input class="faild-base" type="text" name="search-term" id="search-term"
                                                   placeholder="Введите ключевые слова поиска">
                                            <i class="icon-seach"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="faild-wrap">
                                            <select id="category-select" class="select-singl"
                                                    data-placeholder="Выберите раздел портала">
                                                <option></option>
                                                <option value="news" data-url="https://gisp.gov.ru/news/">Новости
                                                </option>
                                                <option value="org" data-url="https://gisp.gov.ru/service-market/org/">
                                                    Предприятия
                                                </option>
                                                <option value="product" data-url="https://gisp.gov.ru/products/">
                                                    Продукция
                                                </option>
                                                <option value="support"
                                                        data-url="https://gisp.gov.ru/support-measures/">Меры поддержки
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 date-field-group">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="faild-wrap faild-icon">
                                                    <input class="faild-base date-start" type="text" name="" placeholder="От">
                                                    <i class="icon-calendar"></i>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="faild-wrap faild-icon">
                                                    <input class="faild-base date-end" type="text" name="" placeholder="До">
                                                    <i class="icon-calendar"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="btn btn-prime btn-search">Найти</div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="btn btn-border search-form-reset-btn">Сбросить</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-5">
                        <?= HtmlWidget::widget([
                            'name' => 'about',
                        ]) ?>
                    </div>
                    <div class="col-xs-12">
                        <div class="sv-list-wrap">
                            <h2 class="section-header">Сервисы портала</h2>
                            <div class="row">
                                <?= HtmlWidget::widget([
                                    'name' => 'producer',
                                ]) ?>
                                <?= HtmlWidget::widget([
                                    'name' => 'catalog',
                                ]) ?>
                                <?= HtmlWidget::widget([
                                    'name' => 'atlas',
                                ]) ?>
                                <?= HtmlWidget::widget([
                                    'name' => 'support',
                                ]) ?>
                                <?= HtmlWidget::widget([
                                    'name' => 'finance',
                                ]) ?>
                                <?= HtmlWidget::widget([
                                    'name' => 'logistika',
                                ]) ?>
                                <?= HtmlWidget::widget([
                                    'name' => 'zakupka',
                                ]) ?>
                                <?= HtmlWidget::widget([
                                    'name' => 'more',
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sv-news">
            <div class="container">
                <h2 class="section-header">Новости отрасли</h2>
                <div class="row">
                    <?= \app\modules\news\widgets\IndexNewsWidget::widget() ?>



                    <div class="col-xs-12 col-sm-6 col-lg-3 mr-base">
                        <div class="subscription-block">
                            <div class="mail-icon">
                                <span class="mail-num">1</span>
                                <img src="<?= $baseUrl ?>/static/stroy/img/mail.svg">
                            </div>
                            <h4 class="subscription-block__header">Подпишись <br/>на рассылку</h4>
                            <p class="subscription-block__text">Оставайтесь в курсе последних событий портала</p>
                            <form class="subscription-block__form">
                                <input class="subscription-input" type="text" id="subscribe-email" name="email"
                                       placeholder="Введите Ваш e-mail">
                                <button type="submit" class="btn btn-prime">ОТПРАВИТЬ</button>
                            </form>
                        </div>
                    </div>
                </div>
                <a href="<?= \yii\helpers\Url::to(['/news/news']) ?>" class="btn btn-prime">Показать еще</a>
            </div>
        </div>
        <div class="section-bg-top"></div>
        <div class="section-bg"></div>
    </section>
    <section id="section-atlas-promishlennosti" class="section-atlas">
        <div class="container">
            <h2 class="section-header">Атлас промышленности</h2>
            <div class="frame-wrap">
                <iframe id="iframe-atlas-promishlennosti"
                        src="https://gisp.gov.ru/atlas/map/public?mode=1&maintypes=271&fullscreen=1&minimize=1"
                        scrolling="no" align="top" frameborder="0">
                </iframe>
            </div>
        </div>
    </section>
    <section class="section-category">
        <div class="container">
            <div class="go-link-wrap">
                <h2 class="section-header">Популярные категории товаров</h2>
                <!--- Скрываем ссылку --->
                <a href="#" class="go-link" style="display:none">Показать все категории<i class="icon-arr-right"></i></a>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <a href="<?= $baseUrl ?>/ru-RU/content/stone-materials" class="category-block">
                        <img class="category-block__image" src="<?= $baseUrl ?>/static/stroy/img/fish/category-1.svg">
                        <div class="category-block__text">Природные каменные материалы</div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <a href="<?= $baseUrl ?>/ru-RU/content/hydration-binders" class="category-block">
                        <img class="category-block__image" src="<?= $baseUrl ?>/static/stroy/img/fish/category-2.svg">
                        <div class="category-block__text">Гидратационные (неорганические) вяжущие вещества</div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <a href="<?= $baseUrl ?>/ru-RU/content/portland" class="category-block">
                        <img class="category-block__image" src="<?= $baseUrl ?>/static/stroy/img/fish/category-3.svg">
                        <div class="category-block__text">Портландцемент</div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <a href="<?= $baseUrl ?>/ru-RU/content/mortars" class="category-block">
                        <img class="category-block__image" src="<?= $baseUrl ?>/static/stroy/img/fish/category-4.svg">
                        <div class="category-block__text">Строительные растворы</div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <a href="<?= $baseUrl ?>/ru-RU/content/glass" class="category-block">
                        <img class="category-block__image" src="<?= $baseUrl ?>/static/stroy/img/fish/category-5.svg">
                        <div class="category-block__text">Стекло и стеклянные изделия</div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <a href="<?= $baseUrl ?>/ru-RU/content/artificial-firing-materials" class="category-block">
                        <img class="category-block__image" src="<?= $baseUrl ?>/static/stroy/img/fish/category-6.svg">
                        <div class="category-block__text">Искусственные обжиговые материалы</div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <a href="<?= $baseUrl ?>/ru-RU/content/coagulation-binders" class="category-block">
                        <img class="category-block__image" src="<?= $baseUrl ?>/static/stroy/img/fish/category-7.svg">
                        <div class="category-block__text">Коагуляционные (органические) вяжущие материалы</div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <a href="<?= $baseUrl ?>/ru-RU/content/polymeric-materials" class="category-block">
                        <img class="category-block__image" src="<?= $baseUrl ?>/static/stroy/img/fish/category-8.svg">
                        <div class="category-block__text">Полимерные материалы</div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="section-support bg-gray">
        <div class="container">
            <div class="go-link-wrap">
                <h2 class="section-header">Меры поддержки</h2>
                <a href="<?= $baseUrl ?>/ru-RU/content/support" class="go-link">Перейти к сервису<i
                            class="icon-arr-right"></i></a>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="support-block">
                        <a href="//gisp.gov.ru/support-measures/list/6922613/" class="support-block__link">
                            <img src="<?= $baseUrl ?>/static/stroy/img/02_minprom.svg"
                                 class="support-block__icon-left">
                            <img src="<?= $baseUrl ?>/static/stroy/img/icon/ic-federal.svg"
                                 class="support-block__icon-right">
                            <div class="support-block__text">Фонд развития промышленности — предоставление льготных
                                займов по программе «Лизинг»
                            </div>
                            <div class="support-block__text">Специальный инвестиционный контракт</div>
                        </a>
                        <div class="support-block-config">
                            <div class="support-block-config__number">
                                Номер НПА: 708 / 16.07.2015
                            </div>
                            <div class="support-block-config__list">
                                <i data-toggle="dropdown" class="icon-all-ver dropdown-toggle"
                                   aria-expanded="false"></i>
                                <ul class="dropdown-menu">
                                    <li><a href="http://frprf.ru/before_registration/">Подать заявку</a></li>
                                    <li><a href="//gisp.gov.ru/support-measures/list/6922613/#send-frp">Запрос на
                                            консультацию</a></li>
                                    <li><a href="#">Подписка на обновления</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="support-block">
                        <a href="//gisp.gov.ru/support-measures/list/8959695/" class="support-block__link">
                            <img src="<?= $baseUrl ?>/static/stroy/img/03_frp.svg" class="support-block__icon-left">
                            <img src="<?= $baseUrl ?>/static/stroy/img/icon/ic-federal.svg"
                                 class="support-block__icon-right">
                            <div class="support-block__text">Фонд развития промышленности — предоставление льготных
                                займов по программе «Лизинг»
                            </div>
                            <div class="support-block__text">Программа ФРП "Цифровизация промышленности"</div>
                        </a>
                        <div class="support-block-config">
                            <div class="support-block-config__number">
                                Номер НПА: 1388 / 17.12.2014
                            </div>
                            <div class="support-block-config__list">
                                <i data-toggle="dropdown" class="icon-all-ver dropdown-toggle"
                                   aria-expanded="false"></i>
                                <ul class="dropdown-menu">
                                    <li><a href="http://frprf.ru/before_registration/">Подать заявку</a></li>
                                    <li><a href="//gisp.gov.ru/support-measures/list/8959695/#send-frp">Запрос на
                                            консультацию</a></li>
                                    <li><a href="#">Подписка на обновления</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="support-block">
                        <a href="#" class="support-block__link">
                            <img src="<?= $baseUrl ?>/static/stroy/img/01_graph.svg"
                                 class="support-block__icon-left">
                            <img src="<?= $baseUrl ?>/static/stroy/img/icon/ic-federal.svg"
                                 class="support-block__icon-right">
                            <div class="support-block__text">Фонд развития промышленности — предоставление льготных
                                займов по программе «Лизинг»
                            </div>
                            <div class="support-block__text">Субсидия на компенсацию процентов по кредитам и/или выплату
                                купонного дохода по облигациям
                            </div>
                        </a>
                        <div class="support-block-config">
                            <div class="support-block-config__number">
                                Номер НПА: 3 / 03.01.2014
                            </div>
                            <div class="support-block-config__list">
                                <i data-toggle="dropdown" class="icon-all-ver dropdown-toggle"
                                   aria-expanded="false"></i>
                                <ul class="dropdown-menu">
                                    <li><a href="//gisp.gov.ru/support-measures/list/6476161/#send-req">Подать
                                            заявку</a></li>
                                    <li><a href="//gisp.gov.ru/support-measures/list/6476161/#send-feed">Запрос на
                                            консультацию</a></li>
                                    <li><a href="#">Подписка на обновления</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="support-block">
                        <a href="#" class="support-block__link">
                            <img src="<?= $baseUrl ?>/static/stroy/img/02_minprom.svg"
                                 class="support-block__icon-left">
                            <img src="<?= $baseUrl ?>/static/stroy/img/icon/ic-federal.svg"
                                 class="support-block__icon-right">
                            <div class="support-block__text">Фонд развития промышленности — предоставление льготных
                                займов по программе «Лизинг»
                            </div>
                            <div class="support-block__text">Подтверждение производства в РФ</div>
                        </a>
                        <div class="support-block-config">
                            <div class="support-block-config__number">
                                Номер НПА: 719 / 17.07.2015
                            </div>
                            <div class="support-block-config__list">
                                <i data-toggle="dropdown" class="icon-all-ver dropdown-toggle"
                                   aria-expanded="false"></i>
                                <ul class="dropdown-menu">
                                    <li><a href="//gisp.gov.ru/support-measures/list/8880371/#send-req">Подать
                                            заявку</a></li>
                                    <li><a href="//gisp.gov.ru/support-measures/list/8880371/#send-feed">Запрос на
                                            консультацию</a></li>
                                    <li><a href="#">Подписка на обновления</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-fin-servise">
        <div class="container">
            <div class="go-link-wrap">
                <h2 class="section-header">Финансовые сервисы</h2>
                <a href="#" class="go-link">все предложения<i class="icon-arr-right"></i></a>
            </div>
            <div class="row">
                <?= HtmlWidget::widget([
                    'name' => 'garant',
                ]) ?>
                <?= HtmlWidget::widget([
                    'name' => 'credit',
                ]) ?>
            </div>
        </div>
    </section>
    <section class="section-product fix-padding bg-gray">
        <div class="container">
            <div class="go-link-wrap">
                <h2 class="section-header">Сервис закупок</h2>
                <a href="#" class="go-link">Перейти к сервису<i class="icon-arr-right"></i></a>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <a href="#" class="category-block">
                        <img class="category-block__image" src="<?= $baseUrl ?>/static/stroy/img/fish/category-1.svg">
                        <div class="category-block__text">Природные каменные материалы</div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <a href="#" class="category-block">
                        <img class="category-block__image" src="<?= $baseUrl ?>/static/stroy/img/fish/category-2.svg">
                        <div class="category-block__text">Гидратационные (неорганические) вяжущие вещества</div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <a href="#" class="category-block">
                        <img class="category-block__image" src="<?= $baseUrl ?>/static/stroy/img/fish/category-3.svg">
                        <div class="category-block__text">Портландцемент</div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <a href="#" class="category-block">
                        <img class="category-block__image" src="<?= $baseUrl ?>/static/stroy/img/fish/category-4.svg">
                        <div class="category-block__text">Строительные растворы</div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <a href="#" class="category-block">
                        <img class="category-block__image" src="<?= $baseUrl ?>/static/stroy/img/fish/category-8.svg">
                        <div class="category-block__text">Стекло и стеклянные изделия</div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <a href="#" class="category-block">
                        <img class="category-block__image" src="<?= $baseUrl ?>/static/stroy/img/fish/category-5.svg">
                        <div class="category-block__text">Искусственные обжиговые материалы</div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <a href="#" class="category-block">
                        <img class="category-block__image" src="<?= $baseUrl ?>/static/stroy/img/fish/category-6.svg">
                        <div class="category-block__text">Коагуляционные (органические) вяжущие материалы</div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <a href="#" class="category-block">
                        <img class="category-block__image" src="<?= $baseUrl ?>/static/stroy/img/fish/category-7.svg">
                        <div class="category-block__text">Полимерные материалы</div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="section-advantage">
        <div class="container">
            <div class="row">
                <?= HtmlWidget::widget([
                    'name' => 'costCount',
                ]) ?>
                <div class="col-xs-12 col-md-9">
                    <div class="block-advantage">
                        <div class="advantage-top">
                            <h2 class="advantage-top__head">Преимущественные Возможности сервиса</h2>
                        </div>
                    </div>
                    <div class="row">
                        <?= HtmlWidget::widget([
                            'name' => 'costCount1',
                        ]) ?>
                        <?= HtmlWidget::widget([
                            'name' => 'costCount2',
                        ]) ?>
                        <?= HtmlWidget::widget([
                            'name' => 'costCount3',
                        ]) ?>
                        <?= HtmlWidget::widget([
                            'name' => 'costCount4',
                        ]) ?>
                    </div>
                    <a href="#" class="btn btn-prime">Расчет и заказ доставки</a>
                </div>
            </div>
        </div>
    </section>
</main>

<script type="text/javascript">
    function resizeFrame(target, height) {
        target = document.getElementById(target);
        target.style.height = height + 'px';
    }

    function listener(event) {
        resizeFrame('iframe-atlas-promishlennosti', event.data)
    }

    if (window.addEventListener) {
        window.addEventListener("message", listener);
    } else {
        window.attachEvent("onmessage", listener);
    }
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<?php

use app\assets\AppAsset;
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

<main class="main-page">
    <section class="section-bg-head-lg newslist">

        <div class="sv-nav">
            <div class="container">
                <div class="header-wrap">
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <div class="svarka-logo">
                                <a href="<?= \yii\helpers\Url::home() . ltrim($baseUrl, '/') ?>">
                                    <img src="<?= $baseUrl ?>/static/stroy/img/logo_st.png">
                                    <h3 class="svarka-logo__header">Строительные<br/>материалы</h3>
                                    <p class="svarka-logo__header-sub">Отраслевой портал</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-8">
                            <div class="about-modal">О чем портал?</div>
                            <div class="nav-wrap">
                                <?= \elfuvo\menu\widgets\MenuWidget::widget([
                                    'section' => 'top', // if sections is enabled
                                    'view' => '@app/modules/menu/widgets/views/topMenu'
                                ]); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-bg-top"></div>
        <div class="container">

            <h1 class="section-header"><?= $this->title ?></h1>
        </div>
    </section>


    <?= $content ?>

</main>
<script type="text/javascript">
    function resizeFrame(target, height) {
        target = document.getElementById(target);
        target.style.height = height + 'px';
    }

    function listener(event) {
        resizeFrame('content-has-frame', event.data)
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

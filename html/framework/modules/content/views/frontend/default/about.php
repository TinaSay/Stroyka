<?php

/* @var $this \yii\web\View */
/* @var $dto app\modules\content\dto\frontend\ContentDto */

$this->title = $dto->getTitle();
$this->params['breadcrumbs'][] = $this->title;
$text = str_replace([chr(10), chr(13), chr(32)], '', strip_tags($dto->getText()));
$baseUrl = Yii::$app->getUrlManager()->getBaseUrl();
$this->registerMetaTag(['name' => 'keywords', 'content' => $dto->getKeywords()]);
$this->registerMetaTag(['name' => 'description', 'content' => $dto->getDescription()]);
?>


<?php if (!$dto->getHideContent()): ?>
    <section class="section-st-con bg-gray">
        <div class="container">
            <div class="page-content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card-content content-base">
                            <?php if (!empty($text)): ?>
                                <?= $dto->getText() ?>
                            <?php endif; ?>

                            <h3>Для кого создан наш портал:</h3>
                            <div class="about-list-block">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                        <div class="about-list-ell">
                                            <img class="ell-icon"
                                                 src="<?= $baseUrl ?>/static/stroy/img/icon/about-icon-1.svg">
                                            <p class="ell-name">ЗАКАЗЧИКИ</p>
                                            <div class="ell-text">Ищите и находите выгодные предложения на строительные
                                                услуги и материалы
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                        <div class="about-list-ell">
                                            <img class="ell-icon"
                                                 src="<?= $baseUrl ?>/static/stroy/img/icon/about-icon-2.svg">
                                            <p class="ell-name">ПРОЕКТНЫЕ ОРГАНИЗАЦИИ</p>
                                            <div class="ell-text">Размещайте свои услуги, находите надежных партнеров и
                                                новых клиентов
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                        <div class="about-list-ell">
                                            <img class="ell-icon"
                                                 src="<?= $baseUrl ?>/static/stroy/img/icon/about-icon-3.svg">
                                            <p class="ell-name">ПРОИЗВОДИТЕЛИ И ПОСТАВЩИКИ СТРОИТЕЛЬНЫХ МАТЕРИАЛОВ</p>
                                            <div class="ell-text">Создавайте свой каталог и расширяйте клиентскую базу
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                        <div class="about-list-ell">
                                            <img class="ell-icon"
                                                 src="<?= $baseUrl ?>/static/stroy/img/icon/about-icon-4.svg">
                                            <p class="ell-name">CТРОИТЕЛЬНЫЕ КОМПАНИИ</p>
                                            <div class="ell-text">Находите новых клиентов, размещайте выгодные
                                                предложения на ваши работы и выбирайте надежных партнеров
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                        <div class="about-list-ell">
                                            <img class="ell-icon"
                                                 src="<?= $baseUrl ?>/static/stroy/img/icon/about-icon-5.svg">
                                            <p class="ell-name">ТРАНСПОРТНЫЕ КОМПАНИИ</p>
                                            <div class="ell-text">Находите новых партнеров, постоянных клиентов на
                                                услуги перевозки и аренды спецтехники
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                        <div class="about-list-ell">
                                            <img class="ell-icon"
                                                 src="<?= $baseUrl ?>/static/stroy/img/icon/about-icon-6.svg">
                                            <p class="ell-name">ИНВЕСТОРЫ</p>
                                            <div class="ell-text">Выбирайте и инвестируйте в выгодные проекты в сфере
                                                строительства
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--
                    <div class="col-xs-12 col-md-4">
                        <div class="feedback-form">
                            <form>
                                <h4 class="form-name">Остались вопросы?</h4>
                                <p class="form-descr">Воспользуйтесь формой обратной связи. Наши специалисты с
                                    удовольствием ответят на все ваши вопросы</p>
                                <div class="faild-wrap">
                                    <input class="faild-base" type="text" name="" placeholder="Как вас зовут?">
                                </div>
                                <div class="faild-wrap">
                                    <input class="faild-base" type="text" name="" placeholder="Ваш e-mail">
                                </div>
                                <div class="faild-wrap">
                                    <textarea class="faild-base" placeholder="Ваш вопрос"></textarea>
                                </div>
                                <p class="form-info">Нажимая кнопку «Отправить» вы даете свое согласие на обработку
                                    ваших <a href="#">персональных данных</a></p>
                                <button type="submit" class="btn btn-prime">ОТПРАВИТЬ</button>
                            </form>
                        </div>
                    </div>
                    -->
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>







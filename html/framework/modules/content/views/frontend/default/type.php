<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $dto app\modules\content\dto\frontend\ContentDto */

$this->title = $dto->getTitle();
$this->params['breadcrumbs'][] = $this->title;
$text = str_replace([chr(10), chr(13), chr(32)], '', strip_tags($dto->getText()));

$this->registerMetaTag(['name' => 'keywords', 'content' => $dto->getKeywords()]);
$this->registerMetaTag(['name' => 'description', 'content' => $dto->getDescription()]);
?>

<?php if (!$dto->getHideContent()): ?>
    <section class="section-st-con bg-gray">
        <div class="container">
            <div class="content-base">
                <?php if (!empty($this->title)): ?>
                    <h1 class="section-header"><?= Html::encode($this->title) ?></h1>
                <?php endif; ?>
                <?php if (!empty($text)): ?>
                    <p>
                        <?= $dto->getText() ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($dto->getHasFrame() && $dto->getFrameLink() != ''): ?>
    <section class="bg-gray">
        <div class="frame-wrap">
            <iframe id="content-has-frame"
                    class="<?= ($dto->getAlias() == 'long-medium-supply-ofer') ? 'height-max' : '' ?>"
                    src="<?= $dto->getFrameLink() ?>" scrolling="no" align="top"
                    frameborder="0" <?= (!empty($dto->getFrameHeight()) ? 'style="height:' . $dto->getFrameHeight() . 'px"' : '') ?>></iframe>
        </div>
    </section>
<?php endif; ?>






<?php

namespace app\modules\news\widgets;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\LinkPager;

/**
 * Class NewsPager
 *
 * @package app\modules\news\widgets
 */
class NewsPager extends LinkPager
{
    /**
     * @return string
     */
    /**
     * Renders the page buttons.
     * @return string the rendering result
     */
    protected function renderPageButtons()
    {
        return parent::renderPageButtons();
    }

    /**
     * @param string $label
     * @param int $page
     * @param string $class
     * @param bool $disabled
     * @param bool $active
     *
     * @return string
     */
    protected function renderPageButton($label, $page, $class, $disabled, $active)
    {
        $options = $this->linkContainerOptions;
        $linkWrapTag = ArrayHelper::remove($options, 'tag', 'li');
        Html::addCssClass($options, empty($class) ? $this->pageCssClass : $class);

        if ($active) {
            Html::addCssClass($options, $this->activePageCssClass);
        }
        if ($disabled) {
            Html::addCssClass($options, $this->disabledPageCssClass);
            $disabledItemOptions = $this->disabledListItemSubTagOptions;
            $disabledItemOptions['class'] = $this->activePageCssClass;
            $tag = ArrayHelper::remove($disabledItemOptions, 'tag', 'span');

            return Html::tag($linkWrapTag, Html::tag($tag, $label, $disabledItemOptions), $options);
        }
        $linkOptions = $this->linkOptions;
        $linkOptions['data-page'] = $page;

        return Html::tag($linkWrapTag, Html::a($label, $this->pagination->createUrl($page), $linkOptions), $options);
    }

    /**
     * @return string|void
     */
    public function run()
    {
        $this->tplPager();
    }

    public function tplPager()
    {
        if ($this->registerLinkTags) {
            $this->registerLinkTags();
        }

        echo $this->renderPageButtons();
    }
}

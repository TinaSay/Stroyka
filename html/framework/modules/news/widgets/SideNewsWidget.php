<?php

namespace app\modules\news\widgets;

use app\modules\news\models\News;
use yii\base\Widget;

/**
 * Class NewsWidget
 *
 * @package app\modules\news\widgets
 */
class SideNewsWidget extends Widget
{
    /**
     * @var array
     */
    public $newslist;

    /**
     * @var string
     */
    public $limit = 3;

    /**
     * @return string
     */
    public function run(): string
    {
        $query = News::find()->where(['hidden' => News::HIDDEN_NO]);
        $this->newslist = $query->limit($this->limit)
            ->orderBy(['createdAt' => SORT_DESC])
            ->all();
        return $this->render('side-news', ['newslist' => $this->newslist]);
    }
}

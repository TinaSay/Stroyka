<?php
/**
 * Copyright (c) Rustam
 */

namespace app\modules\news\widgets;

use app\modules\news\models\News;
use Yii;
use yii\base\Widget;
use yii\caching\TagDependency;

/**
 * Class IndexNewsWidget
 *
 * @package app\modules\news\widgets
 */
class IndexNewsWidget extends Widget
{
    /**
     * @var array
     */
    protected $newslist;


    public function init()
    {
        parent::init();

        $key = [
            __METHOD__,
            __FILE__,
            __LINE__,
        ];

        $dependency = new TagDependency([
            'tags' => [
                News::class,
            ],
        ]);

        if (($this->newslist = Yii::$app->cache->get($key)) === false) {

            $this->newslist = News::find()->joinWith('groupRelation', true)
                ->where([News::tableName() . '.[[hidden]]' => News::HIDDEN_NO])
                ->limit(3)
                ->orderBy([News::tableName() . '.[[createdAt]]' => SORT_DESC])
                ->all();

            Yii::$app->cache->set($key, $this->newslist, null, $dependency);
        }
    }

    /**
     * @return string
     */
    public function run(): string
    {

        return $this->render('news-index', [
            'newslist' => $this->newslist,
        ]);
    }
}

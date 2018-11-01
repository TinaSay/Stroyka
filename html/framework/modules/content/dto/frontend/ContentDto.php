<?php
/**
 * Created by PhpStorm.
 * User: krok
 * Date: 18.04.18
 * Time: 11:06
 */

namespace app\modules\content\dto\frontend;

use app\modules\content\models\Content;


/**
 * Class ContentDto
 *
 * @package app\modules\content\dto\frontend
 */
class ContentDto extends \krok\content\dto\frontend\ContentDto
{
    /**
     * @var Content
     */
    protected $model;


    /**
     * ContentDto constructor.
     *
     * @param Content $model
     */
    public function __construct(Content $model)
    {
        $this->model = $model;
        parent::__construct($model);
    }

    /**
     * @return int
     */
    public function getHasFrame(): ?int
    {
        return $this->model->hasFrame;
    }

    /**
     * @return string
     */
    public function getFrameLink(): ?string
    {
        return $this->model->frameLink;
    }

    /**
     * @return string
     */
    public function getFrameHeight(): ?string
    {
        return $this->model->frameHeight;
    }


    /**
     * @return int|null
     */
    public function getHideContent(): ?int
    {
        return $this->model->hideContent;
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: rustam
 * Date: 04.07.18
 * Time: 11:01
 */

namespace app\modules\content\models;

use yii\helpers\ArrayHelper;
use yii\validators\UrlValidator;

/**
 * Class Content
 *
 * @package app\modules\content\models
 * @property integer $bannerPosition
 * @property string $bannerColor
 * @property integer $productSet
 * @property integer $renderForm
 * @property integer $hasFrame
 * @property string $frameLink
 * @property string $frameHeight
 * @property integer $hideContent
 */
class Content extends \krok\content\models\Content
{

    const HAS_FRAME_NO = 0;
    const HAS_FRAME_YES = 1;

    const HIDE_CONTENT_NO = 0;
    const HIDE_CONTENT_YES = 1;

    /**
     * @return array
     */
    public function behaviors()
    {
        return parent::behaviors() + [

            ];
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['alias', 'layout', 'view', 'hidden'], 'required'],
            [['text', 'frameHeight', 'frameLink'], 'string'],
            [['hidden', 'hideContent'], 'integer'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['alias'], 'match', 'pattern' => '/^([a-z\-0-9]+)$/i'],
            [['alias', 'layout', 'view'], 'string', 'min' => 2, 'max' => 64],
            [['layout', 'view'], 'string', 'max' => 64],
            [['title'], 'string', 'max' => 128],
            [['description', 'keywords'], 'string', 'max' => 256],
            [['language'], 'string', 'max' => 8],
            [
                ['alias'],
                'unique',
                'targetAttribute' => ['alias', 'language'],
            ],
            [['hasFrame'], 'integer'],
            [
                ['frameLink'],
                UrlValidator::class,
                'skipOnEmpty' => true,
                'skipOnError' => true,
                'enableIDN' => true,
                'defaultScheme' => 'http',
                'validSchemes' => ['http', 'https'],
            ],
        ];
    }


    /**
     * @return array
     */
    public function attributeLabels()
    {
        return parent::attributeLabels() + [
                'hasFrame' => 'Показать ифрейм',
                'frameLink' => 'Ссылка ифрейма',
                'frameHeight' => 'Высота ифрейма в пикселях',
                'keywords' => 'Мета ключевые страницы',
                'description' => 'Мета описание',
                'hideContent' => 'Скрывать секцию с заголовком и текстом',
            ];
    }

    /**
     * @return array
     */
    public static function getHasFrameList()
    {
        return [
            self::HAS_FRAME_NO => 'Нет',
            self::HAS_FRAME_YES => 'Да',
        ];
    }

    /**
     * @return array
     */
    public static function getHideContentList()
    {
        return [
            self::HIDE_CONTENT_NO => 'Нет',
            self::HIDE_CONTENT_YES => 'Да',
        ];
    }

    /**
     * @return string|null
     */
    public function getHasFrame()
    {
        return ArrayHelper::getValue($this->getHasFrameList(), $this->hasFrame);
    }

    /**
     * @return string|null
     */
    public function getHideContent()
    {
        return ArrayHelper::getValue($this->getHideContentList(), $this->hideContent);
    }


}

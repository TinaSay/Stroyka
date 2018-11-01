<?php

namespace app\modules\news\models;

use app\modules\auth\models\Auth;
use krok\extend\behaviors\CreatedByBehavior;
use krok\extend\behaviors\LanguageBehavior;
use krok\extend\behaviors\TagDependencyBehavior;
use krok\extend\behaviors\TimestampBehavior;
use krok\extend\interfaces\HiddenAttributeInterface;
use krok\extend\traits\HiddenAttributeTrait;
use krok\storage\behaviors\StorageBehavior;
use krok\storage\dto\StorageDto;
use krok\storage\interfaces\StorageInterface;
use League\Flysystem\FilesystemInterface;
use yii;
use yii\helpers\ArrayHelper;
use yii\validators\ImageValidator;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property integer $id
 * @property integer $group
 * @property string $title
 * @property integer $directionReform
 * @property string $link
 * @property string $text
 * @property string $date
 * @property integer $hidden
 * @property string $language
 * @property integer $createdBy
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property Auth $createdByRelation
 * @property NewsGroup $groupRelation
 */
class News extends \yii\db\ActiveRecord implements HiddenAttributeInterface, StorageInterface
{
    use HiddenAttributeTrait;

    /**
     * @var yii\web\UploadedFile|StorageDto
     */
    private $src;

    /**
     * @return array
     */
    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group', 'hidden', 'createdBy'], 'integer'],
            [['title', 'text', 'date'], 'required'],
            [['date'], 'date', 'format' => 'yyyy-M-d'],
            [['text'], 'string'],
            [['link'], 'string', 'max' => 1000],
            [['date', 'createdAt', 'updatedAt'], 'safe'],
            [['title'], 'string', 'max' => 250],
            [['language'], 'string', 'max' => 8],
            [
                'src',
                ImageValidator::class,
                'minWidth' => 360,
                'minHeight' => 220,
                'extensions' => 'jpg, png',
                'skipOnEmpty' => false,
            ],
            [
                ['link'],
                yii\validators\UrlValidator::class,
                'skipOnEmpty' => true,
                'enableIDN' => true,
                'defaultScheme' => 'http',
            ],
            [
                ['createdBy'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Auth::class,
                'targetAttribute' => ['createdBy' => 'id'],
            ],
            [
                ['group'],
                'exist',
                'skipOnError' => true,
                'targetClass' => NewsGroup::class,
                'targetAttribute' => ['group' => 'id'],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group' => 'Группа',
            'directionReform' => 'Направление реформ',
            'src' => 'Изображение',
            'title' => 'Заголовок',
            'link' => 'Ссылка на оригинал',
            'text' => 'Текст',
            'date' => 'Дата',
            'language' => 'Язык',
            'hidden' => 'Скрыта',
            'createdBy' => 'Создана',
            'createdAt' => 'Создана',
            'updatedAt' => 'Обновлена',

        ];
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'CreatedByBehavior' => CreatedByBehavior::class,
            'TimestampBehavior' => TimestampBehavior::class,
            'TagDependencyBehavior' => TagDependencyBehavior::class,
            'StorageBehavior' => [
                'class' => StorageBehavior::class,
                'attribute' => 'src',
                'scenarios' => [
                    self::SCENARIO_DEFAULT,
                ],
            ],
            'LanguageBehavior' => LanguageBehavior::class,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedByRelation()
    {
        return $this->hasOne(Auth::class, ['id' => 'createdBy']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupRelation()
    {
        return $this->hasOne(NewsGroup::class, ['id' => 'group']);
    }

    /**
     * @inheritdoc
     * @return NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsQuery(get_called_class());
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return static::class;
    }

    /**
     * @return int
     */
    public function getRecordId(): int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return null;
    }

    /**
     * @return null|string
     */
    public function getHint(): ?string
    {
        return null;
    }

    /**
     * @param $src
     */
    public function setSrc($src)
    {
        $this->src = $src;
    }

    /**
     * @return StorageDto|yii\web\UploadedFile
     */
    public function getSrc()
    {
        return $this->src;
    }

    /**
     * @return string
     */
    public function getLoggingTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     * @throws yii\base\InvalidConfigException
     */
    public function getImage()
    {
        $filesystem = Yii::createObject(FilesystemInterface::class);

        if ($this->src instanceof StorageDto) {
            return $filesystem->getPublicUrl($this->src->getSrc());
        }
        return '';
    }

    /**
     * Изображение для виджета на главную страницу
     *
     * @return string
     * @throws yii\base\InvalidConfigException
     */
    public function getMainWidgetImage()
    {
        $filesystem = Yii::createObject(FilesystemInterface::class);

        if ($this->src instanceof StorageDto) {
            return $filesystem->getPublicUrl($this->src->getSrc(), ['w' => 360, 'h' => 220]);
        }

        return '';
    }

    /**
     * @param int $hidden
     *
     * @return array
     */
    public static function getList($hidden = self::HIDDEN_NO)
    {
        $list = self::find()->select([
            'id',
            'title',
        ])->where(['hidden' => $hidden])->language()->orderBy('title')->asArray()->all();

        return ArrayHelper::map($list, 'id', 'title');
    }
}

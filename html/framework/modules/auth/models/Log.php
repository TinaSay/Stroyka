<?php

namespace app\modules\auth\models;

use krok\extend\behaviors\IpBehavior;
use krok\extend\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%auth_log}}".
 *
 * @property integer $id
 * @property integer $authId
 * @property integer $status
 * @property integer $ip
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property Auth $auth
 */
class Log extends \yii\db\ActiveRecord
{
    const STATUS_LOGGED = 1;
    const STATUS_LOGOUT = 2;

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
     * @return array
     */
    public function behaviors()
    {
        return [
            'TimestampBehavior' => [
                'class' => TimestampBehavior::className(),
            ],
            'IpBehavior' => IpBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['authId', 'status', 'ip'], 'integer'],
            [['createdAt', 'updatedAt'], 'safe'],
            [
                ['authId'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Auth::className(),
                'targetAttribute' => ['authId' => 'id'],
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
            'authId' => 'Пользователь',
            'status' => 'Статус',
            'ip' => 'IP',
            'createdAt' => 'Создано',
            'updatedAt' => 'Обновлено',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuth()
    {
        return $this->hasOne(Auth::className(), ['id' => 'authId']);
    }

    /**
     * @return array
     */
    public static function getStatusList()
    {
        return [
            self::STATUS_LOGGED => 'Вход',
            self::STATUS_LOGOUT => 'Выход',
        ];
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return ArrayHelper::getValue(self::getStatusList(), $this->status);
    }

    /**
     * @return array
     */
    public static function getAuthList()
    {
        static $list = null;

        if ($list === null) {
            $models = Log::find()->joinWith('auth')->where(['IS NOT', 'authId', null])->distinct()->asArray()->all();

            $list = ArrayHelper::map($models,
                function (array $model) {
                    return ArrayHelper::getValue($model, ['auth', 'id']);
                }, function (array $model) {
                    return ArrayHelper::getValue($model, ['auth', 'login']);
                });
        }

        return $list;
    }

    /**
     * @inheritdoc
     * @return LogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LogQuery(get_called_class());
    }
}

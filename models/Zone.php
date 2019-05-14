<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zone".
 *
 * @property int $id
 * @property string $name
 * @property int $defaultCityCode
 * @property int $waitingTime
 * @property int $waitingDeviation
 * @property int $defaultCityId
 */
class Zone extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zone';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','defaultCityCode'], 'required'],
            [['defaultCityCode', 'waitingTime', 'waitingDeviation', 'defaultCityId'], 'integer'],
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'شناسه',
            'name' => 'نام',
            'defaultCityCode' => 'کد شهر پیش فرض',
            'waitingTime' => 'زمان انتظار',
            'waitingDeviation' => 'Waiting Deviation',
            'defaultCityId' => 'Default City ID',
        ];
    }
}

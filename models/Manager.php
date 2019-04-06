<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "managers".
 *
 * @property int $id
 * @property string $name
 * @property string $family
 * @property string $username
 * @property string $password
 * @property string $phoneNumber
 * @property string $mobileNumber
 * @property int $accessType
 * @property int $zoneId
 * @property int $type
 */
class Manager extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'managers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['accessType', 'zoneId', 'type'], 'integer'],
            [['name', 'family', 'username', 'password'], 'string', 'max' => 45],
            [['phoneNumber', 'mobileNumber'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'نام',
            'family' => 'نام خانوادگی',
            'username' => 'نام کاربری',
            'password' => 'رمز عبور',
            'phoneNumber' => 'شماره تلفن',
            'mobileNumber' => 'شماره همراه',
            'accessType' => 'نوع دسترسی',
            'zoneId' => 'Zone ID',
            'type' => 'نوع',
        ];
    }
}

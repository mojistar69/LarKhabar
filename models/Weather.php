<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_weather".
 *
 * @property int $id
 * @property string $nam_city
 * @property string $c_url
 * @property int $taeed
 */
class Weather extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_weather';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nam_city', 'c_url'], 'required'],
            [['c_url'], 'string'],
            [['taeed'], 'integer'],
            [['nam_city'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'آی دی',
            'nam_city' => 'نام شهر',
            'c_url' => 'آدرس URL',
            'taeed' => 'وضعیت',
        ];
    }
}

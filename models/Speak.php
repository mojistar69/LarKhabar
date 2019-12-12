<?php

namespace app\models;

use Yii;


class Speak extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'tbl_speak';
    }

    public function rules()
    {
        return [
            [['name', 'email', 'matn'], 'required'],
            [['name', 'email', 'matn'], 'string'],
            [['tarikh'], 'safe'],
            [['taeed'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'آی دی',
            'name' => 'نام',
            'email' => 'پست الکترونیک',
            'matn' => 'متن',
            'tarikh' => 'تاریخ',
            'taeed' => 'تایید',
        ];
    }
}

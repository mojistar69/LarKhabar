<?php

namespace app\models;

use Yii;

/**

 */
class Update extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'tbl_update';
    }


    public function rules()
    {
        return [
            [['title', 'desc', 'imgurl', 'titlenew', 'content', 'linkdown', 'checkdown'], 'required'],
            [['title', 'desc', 'imgurl', 'titlenew', 'content', 'linkdown', 'checkdown'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'آی دی',
            'title' => 'عنوان',
            'desc' => 'توضیحات',
            'imgurl' => 'آدرس عکس',
            'titlenew' => 'عنوان جدید',
            'content' => 'محتوا',
            'linkdown' => 'لینک دانلود',
            'checkdown' => 'Checkdown',
        ];
    }
}

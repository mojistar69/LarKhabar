<?php

namespace app\models;

use Yii;


class Tablig extends \yii\db\ActiveRecord
{
    public $goroohname;
    public $File1;
    public $File2;
    public $File3;
    public $File4;

    public static function tableName()
    {
        return 'tbl_tablig';
    }


    public function rules()
    {
        return [
            [['File1','File2','File3','File4'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg'],
            [['g_id', 'url_list', 'url_info', 'url_link', 'url_list_d', 'url_info_d', 'url_link_d', 'tarikh_start', 'tarikh_end'], 'required'],
            [['g_id', 'taeed'], 'integer'],
            [['url_list', 'url_info', 'url_link', 'url_list_d', 'url_info_d', 'url_link_d'], 'string'],
            [['tarikh_start', 'tarikh_end'], 'safe'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'آی دی',
            'g_id' => 'G ID',
            'url_list' => 'فایل نمایش در لیست خبرها',
            'url_info' => 'فایل نمایش در اکتیویتی مربوط به خبر',
            'url_link' => 'لینک کلیک بر روی عکس',
            'url_list_d' => 'فایل پیشفرض نمایش در لیست خبرها',
            'url_info_d' => 'فایل پیشفرض نمایش در اکتیویتی مربوط به خبر',
            'url_link_d' => 'لینک کلیک بر روی عکس',
            'tarikh_start' => 'تاریخ شروع',
            'tarikh_end' => 'تاریخ پایان',
            'taeed' => 'تایید',
        ];
    }

    public function getTbl_gorooh()
    {
        return $this->hasOne(Gorooh::className(), ['id' => 'g_id']);
    }
    public function get_url_list()
    {
        //convert url  "web/uploads/rbt/71_k.jpg"  to  "uploads/rbt/71_k.jpg"
        $url_list=substr($this->url_list,4,strlen($this->url_list)-4);
        return \Yii::$app->request->BaseUrl.'/'.$url_list;
    }
}

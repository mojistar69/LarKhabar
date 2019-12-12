<?php

namespace app\models;

use Yii;

class Khabar extends \yii\db\ActiveRecord
{
    public $goroohname;
    public $musicFile1;
    public $musicFile2;
    public static function tableName()
    {
        return 'tbl_khabar';
    }


    public function rules()
    {
        return [
            [['musicFile1','musicFile2'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg'],
            [['lid', 'gorooh', 'titr', 'roo_titr', 'matn', 'ax_k', 'ax_b', 'tarikh', 'manba', 'view'], 'required'],
            [['lid', 'titr', 'roo_titr', 'matn', 'ax_k', 'ax_b', 'manba', 'film', 'film_aparat', 'film_onvan'], 'string'],
            [['gorooh', 'slide', 'taeed', 'view', 'viewtype', 'view_fm'], 'integer'],
            [['tarikh'], 'safe'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'شناسه',
            'lid' => 'لید خبر',
            'gorooh' => 'گروه',
            'titr' => 'تیتر',
            'roo_titr' => 'روتیتر',
            'matn' => 'متن',
            'ax_k' => 'عکس کوچک',
            'ax_b' => 'عکس بزرگ',
            'tarikh' => 'تاریخ درج خبر',
            'manba' => 'منبع',
            'film' => 'آدرس فیلم یا صوت (host)',
            'film_aparat' => 'آدرس فیلم یا صوت (aparat)',
            'film_onvan' => 'عنوان',
            'slide' => 'نوع خبر',
            'taeed' => 'وضعیت تایید',
            'view' => 'تعداد بازدید خبر',
            'viewtype' => 'نحوه نمایش لوگوی خبر',
            'view_fm' => 'نوع آیکون لوگوی خبر',
        ];
    }

    public function getTbl_gorooh()
    {
        return $this->hasOne(Gorooh::className(), ['id' => 'gorooh']);
    }
    public function getImageurlk()
    {
        //convert url  "web/uploads/rbt/71_k.jpg"  to  "uploads/rbt/71_k.jpg"
        $url_k=substr($this->ax_k,4,strlen($this->ax_k)-4);
        return \Yii::$app->request->BaseUrl.'/'.$url_k;
    }
    public function getImageurlb()
    {
        //convert url "web/uploads/rbt/71_b.jpg"  to  "uploads/rbt/71_b.jpg"
        $url_b=substr($this->ax_b,4,strlen($this->ax_b)-4);
        return \Yii::$app->request->BaseUrl.'/'.$url_b;
    }
}

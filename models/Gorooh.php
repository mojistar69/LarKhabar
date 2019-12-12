<?php

namespace app\models;

use Yii;


class Gorooh extends \yii\db\ActiveRecord
{
    public $musicFile1;

    public static function tableName()
    {
        return 'tbl_gorooh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['onvan', 'ax'], 'required'],
            [['ax'], 'string'],
            [['onvan'], 'string', 'max' => 35],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'شناسه',
            'onvan' => 'عنوان',
            'ax' => 'عکس',
        ];
    }

    public function getImageurl()
    {
        //convert url "web/uploads/rbt/71_g.jpg"  to  "uploads/rbt/71_g.jpg"
        $url_g=substr($this->ax,4,strlen($this->ax)-4);
        return \Yii::$app->request->BaseUrl.'/'.$url_g;
    }


}

<?php

namespace app\models;

use Yii;


class Slider extends \yii\db\ActiveRecord
{
    public $goroohname;
    public $g_id;
    public $titr;
    public $File1;
    public $Description1;
    public $File2;
    public $Description2;
    public $File3;
    public $Description3;
    public $File4;
    public $Description4;
    public $File5;
    public $Description5;
    public $File6;
    public $Description6;
    public $File7;
    public $Description7;
    public $File8;
    public $Description8;
    public $File9;
    public $Description9;
    public $File10;
    public $Description10;




    public function rules()
    {
        return [
            [['File1','File2','File3','File4'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg'],
            [['Description1', 'Description2', 'Description3', 'Description4', 'Description5', 'Description6', 'Description7', 'Description8', 'Description9', 'Description10'], 'string'],
        ];
    }


    public function attributeLabels()
    {
        return [

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

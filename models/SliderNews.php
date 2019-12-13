<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_slider_news".
 *
 * @property int $id
 * @property int $g_id
 * @property string $g_url
 * @property string $g_descript
 */
class SliderNews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_slider_news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['g_id', 'g_url', 'g_descript'], 'required'],
            [['g_id'], 'integer'],
            [['g_url', 'g_descript'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'g_id' => 'G ID',
            'g_url' => 'G Url',
            'g_descript' => 'G Descript',
        ];
    }
}

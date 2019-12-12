<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_didgah".
 *
 * @property int $id
 * @property int $g_id
 * @property string $name
 * @property string $email
 * @property string $matn
 * @property string $tarikh
 * @property int $taeed
 */
class Didgah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_didgah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['g_id', 'name', 'email', 'matn'], 'required'],
            [['g_id', 'taeed'], 'integer'],
            [['matn'], 'string'],
            [['tarikh'], 'safe'],
            [['name'], 'string', 'max' => 40],
            [['email'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'شناسه دیدگاه',
            'g_id' => 'شناسه خبر',
            'name' => 'صاحب دیدگاه',
            'email' => 'ایمیل',
            'matn' => 'متن دیدگاه',
            'tarikh' => 'تاریخ',
            'taeed' => 'وضعیت تایید',
        ];
    }
}

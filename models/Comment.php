<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_comment".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $matn
 * @property string $tarikh
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'matn'], 'required'],
            [['name', 'email', 'matn'], 'string'],
            [['tarikh'], 'safe'],
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
            'email' => 'ایمیل',
            'matn' => 'متن',
            'tarikh' => 'تاریخ',
        ];
    }
}

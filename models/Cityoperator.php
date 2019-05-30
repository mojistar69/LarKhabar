<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cityoperators".
 *
 * @property int $id
 * @property int $cityId
 * @property int $opid
 */
class Cityoperator extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cityoperators';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cityId', 'opid'], 'required'],
            [['cityId', 'opid'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cityId' => 'City ID',
            'opid' => 'Opid',
        ];
    }
}

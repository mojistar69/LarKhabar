<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disturbers".
 *
 * @property int $id
 * @property string $callerid
 * @property int $opid
 * @property int $opnumber
 * @property string $calluid
 * @property string $callid
 * @property string $d_date
 * @property int $cityId
 */
class Disturber extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disturbers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['opid', 'd_date', 'cityId'], 'required'],
            [['opid', 'opnumber', 'calluid', 'cityId'], 'integer'],
            [['d_date'], 'safe'],
            [['callerid', 'callid'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'callerid' => 'Callerid',
            'opid' => 'Opid',
            'opnumber' => 'Opnumber',
            'calluid' => 'Calluid',
            'callid' => 'Callid',
            'd_date' => 'D Date',
            'cityId' => 'City ID',
        ];
    }
    
        public function getOperator()
    {
        return $this->hasOne(Operator::className(), ['opid' => 'opid']);
    }

    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'cityId']);
    }
}

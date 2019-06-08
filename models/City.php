<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property int $zoneid
 * @property int $code
 * @property string $name
 * @property string $headernumber
 * @property string $newheadernumber
 * @property string $preCode
 * @property int $priority
 */
class City extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'city';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['zoneid', 'code', 'priority'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['headernumber', 'newheadernumber'], 'string', 'max' => 10],
            [['preCode'], 'string', 'max' => 8],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'zoneid' => 'شماره منطقه',
            'code' => 'کد شهر',
            'name' => 'نام',
            'headernumber' => 'سر شماره',
            'newheadernumber' => 'سر شماره دوم',
            'preCode' => 'Pre Code',
            'priority' => 'اولویت',
        ];
    }
}

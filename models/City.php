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
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
            'zoneid' => 'Zoneid',
            'code' => 'Code',
            'name' => 'Name',
            'headernumber' => 'Headernumber',
            'newheadernumber' => 'Newheadernumber',
            'preCode' => 'Pre Code',
            'priority' => 'Priority',
        ];
    }
}

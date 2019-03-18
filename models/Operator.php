<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "operators".
 *
 * @property int $opid
 * @property int $opnumber
 * @property string $currentcallid
 * @property int $state
 * @property string $pass
 * @property string $user
 * @property int $citycode
 * @property int $cityid
 * @property int $activate
 * @property string $name
 * @property string $family
 * @property string $phone
 * @property string $mobile
 * @property int $sex
 * @property int $supervisorconfirm
 * @property int $showcallerid
 * @property int $showstatistics
 * @property int $serviceenabled
 * @property int $operationtype
 * @property int $opnumberpre
 * @property string $vUser
 * @property string $vPass
 */
class Operator extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'operators';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['opnumber', 'pass', 'user', 'name', 'family'], 'required'],
            [['opnumber', 'state', 'citycode', 'cityid', 'activate', 'sex', 'supervisorconfirm', 'showcallerid', 'showstatistics', 'serviceenabled', 'operationtype', 'opnumberpre'], 'integer'],
            [['currentcallid'], 'string', 'max' => 20],
            [['pass', 'user'], 'string', 'max' => 30],
            [['name', 'family', 'vUser', 'vPass'], 'string', 'max' => 45],
            [['phone', 'mobile'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'opid' => 'Opid',
            'opnumber' => 'Opnumber',
            'currentcallid' => 'Currentcallid',
            'state' => 'State',
            'pass' => 'Pass',
            'user' => 'User',
            'citycode' => 'Citycode',
            'cityid' => 'Cityid',
            'activate' => 'Activate',
            'name' => 'Name',
            'family' => 'Family',
            'phone' => 'Phone',
            'mobile' => 'Mobile',
            'sex' => 'Sex',
            'supervisorconfirm' => 'Supervisorconfirm',
            'showcallerid' => 'Showcallerid',
            'showstatistics' => 'Showstatistics',
            'serviceenabled' => 'Serviceenabled',
            'operationtype' => 'Operationtype',
            'opnumberpre' => 'Opnumberpre',
            'vUser' => 'V User',
            'vPass' => 'V Pass',
        ];
    }
}

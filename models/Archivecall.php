<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "archivecalls".
 *
 * @property string $calluid
 * @property string $lastcallid
 * @property string $operatorchain
 * @property string $startdatetime
 * @property string $enddatetime
 * @property int $calllaststate
 * @property string $callerid
 * @property int $cityid
 * @property int $zoneid
 * @property int $talktime
 * @property int $opnumber
 * @property int $opid
 * @property int $serverid
 * @property string $callednumber
 * @property string $channel
 * @property int $record
 * @property string $responses
 * @property int $service
 */
class Archivecall extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'archivecalls';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lastcallid', 'opid'], 'required'],
            [['startdatetime', 'enddatetime'], 'safe'],
            [['calllaststate', 'cityid', 'zoneid', 'talktime', 'opnumber', 'opid', 'serverid', 'record', 'service'], 'integer'],
            [['lastcallid'], 'string', 'max' => 25],
            [['operatorchain'], 'string', 'max' => 50],
            [['callerid'], 'string', 'max' => 15],
            [['callednumber'], 'string', 'max' => 10],
            [['channel'], 'string', 'max' => 40],
            [['responses'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'calluid' => 'Calluid',
            'lastcallid' => 'Lastcallid',
            'operatorchain' => 'Operatorchain',
            'startdatetime' => 'Startdatetime',
            'enddatetime' => 'Enddatetime',
            'calllaststate' => 'Calllaststate',
            'callerid' => 'Callerid',
            'cityid' => 'Cityid',
            'zoneid' => 'Zoneid',
            'talktime' => 'Talktime',
            'opnumber' => 'Opnumber',
            'opid' => 'Opid',
            'serverid' => 'Serverid',
            'callednumber' => 'Callednumber',
            'channel' => 'Channel',
            'record' => 'Record',
            'responses' => 'Responses',
            'service' => 'Service',
        ];
    }
    public function getOperator()
    {
        return $this->hasOne(Operator::className(), ['opid' => 'opid']);
    }

    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'cityid']);
    }
}

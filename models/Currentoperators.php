<?php

namespace app\models;

use Yii;



class Currentoperators extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'currentoperators';
    }

    public function rules()
    {
        return [
            [['opid', 'logindatetime'], 'required'],
            [['opid', 'currentcalluid', 'rcvcall', 'anscall', 'nanscalls', 'opnumber', 'state', 'cityId', 'callcityId', 'localport', 'operatorrequest', 'systemrequest', 'supervisorconfirm', 'showcallerid', 'operatorstate', 'endcall7', 'endcall8', 'endcall9', 'endcall11', 'supervisorrequest', 'liport', 'serviceenabled', 'showstatistics', 'operationtype', 'rcvspecial', 'ansspecial'], 'integer'],
            [['lastchoosedatetime', 'logindatetime', 'logoffdatetime', 'lastAlive'], 'safe'],
            [['currentcallid'], 'string', 'max' => 25],
            [['localmac'], 'string', 'max' => 45],
            [['lihost'], 'string', 'max' => 50],
            [['localip'], 'string', 'max' => 20],
            [['token'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'opid' => 'Opid',
            'currentcallid' => 'Currentcallid',
            'currentcalluid' => 'Currentcalluid',
            'lastchoosedatetime' => 'Lastchoosedatetime',
            'rcvcall' => 'Rcvcall',
            'anscall' => 'Anscall',
            'nanscalls' => 'Nanscalls',
            'opnumber' => 'Opnumber',
            'state' => 'State',
            'cityId' => 'City ID',
            'callcityId' => 'Callcity ID',
            'localmac' => 'Localmac',
            'localport' => 'Localport',
            'logindatetime' => 'Logindatetime',
            'logoffdatetime' => 'Logoffdatetime',
            'lastAlive' => 'Last Alive',
            'operatorrequest' => 'Operatorrequest',
            'systemrequest' => 'Systemrequest',
            'supervisorconfirm' => 'Supervisorconfirm',
            'showcallerid' => 'Showcallerid',
            'operatorstate' => 'Operatorstate',
            'endcall7' => 'Endcall7',
            'endcall8' => 'Endcall8',
            'endcall9' => 'Endcall9',
            'endcall11' => 'Endcall11',
            'supervisorrequest' => 'Supervisorrequest',
            'lihost' => 'Lihost',
            'liport' => 'Liport',
            'serviceenabled' => 'Serviceenabled',
            'showstatistics' => 'Showstatistics',
            'operationtype' => 'Operationtype',
            'rcvspecial' => 'Rcvspecial',
            'ansspecial' => 'Ansspecial',
            'localip' => 'Localip',
            'token' => 'Token',
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

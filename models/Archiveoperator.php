<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "archiveoperators".
 *
 * @property string $id
 * @property string $logindatetime
 * @property string $logoffdatetime
 * @property int $rcvcall
 * @property int $anscall
 * @property int $nanscalls
 * @property int $opnumber
 * @property int $opid
 * @property int $cityId
 * @property int $operatorrequest
 * @property int $supervisorconfirm
 * @property int $endcall7
 * @property int $endcall8
 * @property int $endcall9
 * @property int $endcall11
 * @property string $localip
 */
class Archiveoperator extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'federated_archiveoperators';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['logindatetime', 'logoffdatetime', 'rcvcall', 'anscall', 'opnumber', 'opid', 'cityId', 'localip'], 'required'],
            [['logindatetime', 'logoffdatetime'], 'safe'],
            [['rcvcall', 'anscall', 'nanscalls', 'opnumber', 'opid', 'cityId', 'operatorrequest', 'supervisorconfirm', 'endcall7', 'endcall8', 'endcall9', 'endcall11'], 'integer'],
            [['localip'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'شناسه',
            'logindatetime' => 'Logindatetime',
            'logoffdatetime' => 'Logoffdatetime',
            'rcvcall' => 'Rcvcall',
            'anscall' => 'Anscall',
            'nanscalls' => 'Nanscalls',
            'opnumber' => 'Opnumber',
            'opid' => 'Opid',
            'cityId' => 'City ID',
            'operatorrequest' => 'Operatorrequest',
            'supervisorconfirm' => 'Supervisorconfirm',
            'endcall7' => 'Endcall7',
            'endcall8' => 'Endcall8',
            'endcall9' => 'Endcall9',
            'endcall11' => 'Endcall11',
            'localip' => 'Localip',
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

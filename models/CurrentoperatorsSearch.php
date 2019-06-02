<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Currentoperators;

/**
 * CurrentoperatorsSearch represents the model behind the search form of `app\models\Currentoperators`.
 */
class CurrentoperatorsSearch extends Currentoperators
{
    public $name;
    public $operator_number;
    public $operator_family;
    public $cityname;
    public function rules()
    {
        return [
            [['id', 'opid', 'currentcalluid', 'rcvcall', 'anscall', 'nanscalls', 'opnumber', 'state', 'cityId', 'callcityId', 'localport', 'operatorrequest', 'systemrequest', 'supervisorconfirm', 'showcallerid', 'operatorstate', 'endcall7', 'endcall8', 'endcall9', 'endcall11', 'supervisorrequest', 'liport', 'serviceenabled', 'showstatistics', 'operationtype', 'rcvspecial', 'ansspecial'], 'integer'],
            [['currentcallid', 'lastchoosedatetime', 'localmac', 'logindatetime', 'logoffdatetime', 'lastAlive', 'lihost', 'localip', 'token','name','operator_number','operator_family','cityname'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Currentoperators::find();
        $query->innerJoinWith('operator');
        $query->innerJoinWith('city');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' =>false
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'opid' => $this->opid,
            'currentcalluid' => $this->currentcalluid,
            'lastchoosedatetime' => $this->lastchoosedatetime,
            'rcvcall' => $this->rcvcall,
            'anscall' => $this->anscall,
            'nanscalls' => $this->nanscalls,
            'opnumber' => $this->opnumber,
            'state' => $this->state,
            'cityId' => $this->cityId,
            'callcityId' => $this->callcityId,
            'localport' => $this->localport,
            'logindatetime' => $this->logindatetime,
            'logoffdatetime' => $this->logoffdatetime,
            'lastAlive' => $this->lastAlive,
            'operatorrequest' => $this->operatorrequest,
            'systemrequest' => $this->systemrequest,
            'supervisorconfirm' => $this->supervisorconfirm,
            'showcallerid' => $this->showcallerid,
            'operatorstate' => $this->operatorstate,
            'endcall7' => $this->endcall7,
            'endcall8' => $this->endcall8,
            'endcall9' => $this->endcall9,
            'endcall11' => $this->endcall11,
            'supervisorrequest' => $this->supervisorrequest,
            'liport' => $this->liport,
            'serviceenabled' => $this->serviceenabled,
            'showstatistics' => $this->showstatistics,
            'operationtype' => $this->operationtype,
            'rcvspecial' => $this->rcvspecial,
            'ansspecial' => $this->ansspecial,
        ]);

        $query->andFilterWhere(['like', 'currentcallid', $this->currentcallid])
            ->andFilterWhere(['like', 'localmac', $this->localmac])
            ->andFilterWhere(['like', 'lihost', $this->lihost])
            ->andFilterWhere(['like', 'localip', $this->localip])
            ->andFilterWhere(['like', 'token', $this->token]);

        return $dataProvider;
    }
}

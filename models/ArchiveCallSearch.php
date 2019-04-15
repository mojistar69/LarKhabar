<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\archivecall;

/**
 * ArchiveCallSearch represents the model behind the search form of `app\models\archivecall`.
 */
class ArchiveCallSearch extends archivecall
{
    /**
     * {@inheritdoc}
     */
    public $name;
    public $family;
    public $startDate;
    public $endDate;

    public function rules()
    {
        return [
            [['calluid', 'calllaststate', 'cityid', 'zoneid', 'talktime', 'opnumber', 'serverid', 'record', 'service','opid'], 'integer'],
            [['lastcallid', 'operatorchain', 'startdatetime', 'enddatetime', 'callerid', 'callednumber', 'channel', 'responses','opid','name','family'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = archivecall::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'calluid' => $this->calluid,
            'startdatetime' => $this->startdatetime,
            'enddatetime' => $this->enddatetime,
            'calllaststate' => $this->calllaststate,
            'cityid' => $this->cityid,
            'zoneid' => $this->zoneid,
            'talktime' => $this->talktime,
            'opnumber' => $this->opnumber,
            'operators.opid' => $this->opid,
            'serverid' => $this->serverid,
            'record' => $this->record,
            'service' => $this->service,
        ]);

        $query->andFilterWhere(['like', 'lastcallid', $this->lastcallid])
            ->andFilterWhere(['like', 'operatorchain', $this->operatorchain])
            ->andFilterWhere(['like', 'callerid', $this->callerid])
            ->andFilterWhere(['like', 'callednumber', $this->callednumber])
            ->andFilterWhere(['like', 'channel', $this->channel])
            ->andFilterWhere(['like', 'responses', $this->responses])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'family', $this->family]);

        return $dataProvider;
    }
}

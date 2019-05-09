<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Archivecall;

/**
 * ArchivecallSearch represents the model behind the search form of `app\models\Archivecall`.
 */
class ArchivecallSearch extends Archivecall
{
    public $name;
    public $operator_id;
    public $operator_family;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['calluid', 'calllaststate', 'cityid', 'zoneid', 'talktime', 'opnumber', 'opid', 'serverid', 'record', 'service'], 'integer'],
            [['lastcallid', 'operatorchain', 'startdatetime', 'enddatetime', 'callerid', 'callednumber', 'channel', 'responses',
                'name','operator_id','operator_family'], 'safe'],
        ];
    }
    public function attributes()
    {
        return array_merge(parent::attributes(),
            [
                'operator.name','operator.opid',
            ]
        );
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

        $startdate=$params['startdate'];
        $enddate=$params['enddate'];
        $query = Archivecall::find();
        $query->joinWith('operator');
        $query->andwhere('startdatetime >='.$startdate);
        $query->andwhere('enddatetime <= '.$enddate);

        // add conditions that should always apply here

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
            'opid' => $this->opid,
            'serverid' => $this->serverid,
            'record' => $this->record,
            'service' => $this->service,
        ]);

        $query->andFilterWhere(['like', 'lastcallid', $this->lastcallid])
            ->andFilterWhere(['like', 'operatorchain', $this->operatorchain])
            ->andFilterWhere(['like', 'callerid', $this->callerid])
            ->andFilterWhere(['like', 'callednumber', $this->callednumber])
            ->andFilterWhere(['like', 'channel', $this->channel])
            ->andFilterWhere(['like', 'responses', $this->responses]);
            $query->andFilterWhere(['like', 'operators.name', $this->name]);
            $query->andFilterWhere(['like', 'operators.opid', $this->operator_id]);
            $query->andFilterWhere(['like', 'operators.family', $this->operator_family]);

        return $dataProvider;
    }
}

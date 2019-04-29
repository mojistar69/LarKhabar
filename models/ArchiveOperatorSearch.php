<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Archiveoperators;

/**
 * ArchiveOperatorSearch represents the model behind the search form of `app\models\Archiveoperators`.
 */
class ArchiveOperatorSearch extends Archiveoperators
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'rcvcall', 'anscall', 'nanscalls', 'opnumber', 'opid', 'cityId', 'operatorrequest', 'supervisorconfirm', 'endcall7', 'endcall8', 'endcall9', 'endcall11'], 'integer'],
            [['logindatetime', 'logoffdatetime', 'localip'], 'safe'],
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
        $query = Archiveoperators::find();

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
            'id' => $this->id,
            'logindatetime' => $this->logindatetime,
            'logoffdatetime' => $this->logoffdatetime,
            'rcvcall' => $this->rcvcall,
            'anscall' => $this->anscall,
            'nanscalls' => $this->nanscalls,
            'opnumber' => $this->opnumber,
            'opid' => $this->opid,
            'cityId' => $this->cityId,
            'operatorrequest' => $this->operatorrequest,
            'supervisorconfirm' => $this->supervisorconfirm,
            'endcall7' => $this->endcall7,
            'endcall8' => $this->endcall8,
            'endcall9' => $this->endcall9,
            'endcall11' => $this->endcall11,
        ]);

        $query->andFilterWhere(['like', 'localip', $this->localip]);

        return $dataProvider;
    }
}
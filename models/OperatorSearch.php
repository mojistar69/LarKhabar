<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Operator;

/**
 * OperatorSearch represents the model behind the search form of `app\models\Operator`.
 */
class OperatorSearch extends Operator
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['opid', 'opnumber', 'state', 'citycode', 'cityid', 'activate', 'sex', 'supervisorconfirm', 'showcallerid', 'showstatistics', 'serviceenabled', 'operationtype', 'opnumberpre'], 'integer'],
            [['currentcallid', 'pass', 'user', 'name', 'family', 'phone', 'mobile', 'vUser', 'vPass'], 'safe'],
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
        $query = Operator::find();


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
            'opid' => $this->opid,
            'opnumber' => $this->opnumber,
            'state' => $this->state,
            'citycode' => $this->citycode,
            'cityid' => $this->cityid,
            'activate' => $this->activate,
            'sex' => $this->sex,
            'supervisorconfirm' => $this->supervisorconfirm,
            'showcallerid' => $this->showcallerid,
            'showstatistics' => $this->showstatistics,
            'serviceenabled' => $this->serviceenabled,
            'operationtype' => $this->operationtype,
            'opnumberpre' => $this->opnumberpre,
        ]);

        $query->andFilterWhere(['like', 'currentcallid', $this->currentcallid])
            ->andFilterWhere(['like', 'pass', $this->pass])
            ->andFilterWhere(['like', 'user', $this->user])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'family', $this->family])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'vUser', $this->vUser])
            ->andFilterWhere(['like', 'vPass', $this->vPass]);

        return $dataProvider;
    }
}

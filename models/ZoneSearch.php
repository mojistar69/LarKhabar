<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Zone;

/**
 * ZoneSearch represents the model behind the search form of `app\models\Zone`.
 */
class ZoneSearch extends Zone
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'defaultCityCode', 'waitingTime', 'waitingDeviation', 'defaultCityId'], 'integer'],
            [['name'], 'safe'],
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
        $query = Zone::find();

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
            'defaultCityCode' => $this->defaultCityCode,
            'waitingTime' => $this->waitingTime,
            'waitingDeviation' => $this->waitingDeviation,
            'defaultCityId' => $this->defaultCityId,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}

<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Didgah;

/**
 * DidgahSearch represents the model behind the search form of `app\models\Didgah`.
 */
class DidgahSearch extends Didgah
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'g_id', 'taeed'], 'integer'],
            [['name', 'email', 'matn', 'tarikh'], 'safe'],
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
        $query = Didgah::find();

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
            'g_id' => $this->g_id,
            'tarikh' => $this->tarikh,
            'taeed' => $this->taeed,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'matn', $this->matn]);

        return $dataProvider;
    }
}

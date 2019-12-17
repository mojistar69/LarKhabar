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
    public $khabarname;
    public function rules()
    {
        return [
            [['id', 'g_id', 'taeed'], 'integer'],
            [['name', 'email', 'matn', 'tarikh','khabarname'], 'safe'],
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


    public function search($params)
    {
        $query = Didgah::find();
        $query->innerJoinWith('tbl_khabar');
        $query->orderBy('id DESC');

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
            'tbl_didgah.id' => $this->id,
            'tbl_didgah.g_id' => $this->g_id,
            'tbl_didgah.tarikh' => $this->tarikh,
            'tbl_didgah.taeed' => $this->taeed,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'tbl_didgah.matn', $this->matn])
        ->andFilterWhere(['like', 'tbl_khabar.titr', $this->khabarname]);

        return $dataProvider;
    }
}

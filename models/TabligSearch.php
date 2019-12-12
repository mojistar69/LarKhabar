<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tablig;

/**
 * TabligSearch represents the model behind the search form of `app\models\Tablig`.
 */
class TabligSearch extends Tablig
{
    public $goroohname;
    public function rules()
    {
        return [
            [['id', 'g_id', 'taeed'], 'integer'],
            [['url_list', 'url_info', 'url_link', 'url_list_d', 'url_info_d', 'url_link_d', 'tarikh_start', 'tarikh_end','goroohname'], 'safe'],
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
        $query = Tablig::find();
        $query->innerJoinWith('tbl_gorooh');
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
            'id' => $this->id,
            'g_id' => $this->g_id,
            'tarikh_start' => $this->tarikh_start,
            'tarikh_end' => $this->tarikh_end,
            'taeed' => $this->taeed,
        ]);

        $query->andFilterWhere(['like', 'url_list', $this->url_list])
            ->andFilterWhere(['like', 'url_info', $this->url_info])
            ->andFilterWhere(['like', 'url_link', $this->url_link])
            ->andFilterWhere(['like', 'url_list_d', $this->url_list_d])
            ->andFilterWhere(['like', 'url_info_d', $this->url_info_d])
            ->andFilterWhere(['like', 'url_link_d', $this->url_link_d])
        ->andFilterWhere(['like', 'tbl_gorooh.onvan', $this->goroohname]);

        return $dataProvider;
    }
}

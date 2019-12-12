<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Update;

/**
 * UpdateSearch represents the model behind the search form of `app\models\Update`.
 */
class UpdateSearch extends Update
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'desc', 'imgurl', 'titlenew', 'content', 'linkdown', 'checkdown'], 'safe'],
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
        $query = Update::find();

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
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'desc', $this->desc])
            ->andFilterWhere(['like', 'imgurl', $this->imgurl])
            ->andFilterWhere(['like', 'titlenew', $this->titlenew])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'linkdown', $this->linkdown])
            ->andFilterWhere(['like', 'checkdown', $this->checkdown]);

        return $dataProvider;
    }
}

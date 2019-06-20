<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Disturber;

/**
 * DisturberSearch represents the model behind the search form of `app\models\Disturber`.
 */
class DisturberSearch extends Disturber
{
    public $oopnumber;
    public $oname;
    public $ofamily;
    public $cname;
    public function rules()
    {
        return [
            [['id', 'opid', 'opnumber', 'calluid', 'cityId'], 'integer'],
            [['callerid', 'callid', 'd_date','oname','ofamily','cname'], 'safe'],
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
        
        $startdate=$params['startdate'];
        $enddate=$params['enddate'];
        $query = Disturber::find();
        $query->innerJoinWith('operator');
        $query->innerJoinWith('city');
        $query->andwhere('d_date >='.$startdate);
        $query->andwhere('d_date <= '.$enddate);
//        $query->groupBy('callerid');



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
            'opid' => $this->opid,
            'opnumber' => $this->opnumber,
            'calluid' => $this->calluid,
            'd_date' => $this->d_date,
            'cityId' => $this->cityId,
        ]);

        $query->andFilterWhere(['like', 'callerid', $this->callerid])
            ->andFilterWhere(['like', 'callid', $this->callid]);
        $query->andFilterWhere(['like', 'operators.name', $this->oname]);
        $query->andFilterWhere(['like', 'operators.family', $this->ofamily]);
        $query->andFilterWhere(['like', 'city.name', $this->cname]);

        return $dataProvider;
    }
}

<?php

namespace app\models;

use app\controllers\ChangeDate;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Khabar;

/**
 * KhabarSearch represents the model behind the search form of `app\models\Khabar`.
 */
class KhabarSearch extends Khabar
{
    public $goroohname;
    public function rules()
    {
        return [
            [['id', 'gorooh', 'slide', 'taeed', 'view', 'viewtype', 'view_fm'], 'integer'],
            [['lid', 'titr', 'roo_titr', 'matn', 'ax_k', 'ax_b', 'tarikh', 'manba', 'film', 'film_aparat', 'film_onvan','goroohname'], 'safe'],
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
        $query = Khabar::find();
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
            if($this->view=='1')
                $query->orderBy('view DESC');
            elseif ($this->view=='0')
                $query->orderBy('view ASC');

        // grid filtering conditions
        $query->andFilterWhere([
            'tbl_khabar.id' => $this->id,
            'gorooh' => $this->gorooh,
            //'tarikh' => $this->tarikh,
            'slide' => $this->slide,
            'taeed' => $this->taeed,
            //'view' => $this->view,
            'viewtype' => $this->viewtype,
            'view_fm' => $this->view_fm,
        ]);

        $chdt=new ChangeDate();
        $Date_Miladi='';

        if(isset($this->tarikh) && $this->tarikh!='' ) {
            $firstSlashIndex=stripos($this->tarikh,"/");
            $lastSlashIndex=strrpos($this->tarikh,"/");
            if($firstSlashIndex==4&&($lastSlashIndex==7 ||$lastSlashIndex==6)) {
                $tmp1 = explode('/', $this->tarikh);
                $Date_Miladi = $chdt->jalali_to_gregorian($tmp1[0], $tmp1[1], $tmp1[2], '-');
                $tmp2=explode('-', $Date_Miladi);
                $Date_Miladi = $chdt->normalize($tmp2[0], $tmp2[1], $tmp2[2]);

            }
            else
                $Date_Miladi=$this->tarikh;

        }
        $query->andFilterWhere(['like', 'lid', $this->lid])
            ->andFilterWhere(['like', 'titr', $this->titr])
            ->andFilterWhere(['like', 'roo_titr', $this->roo_titr])
            ->andFilterWhere(['like', 'matn', $this->matn])
            ->andFilterWhere(['like', 'ax_k', $this->ax_k])
            ->andFilterWhere(['like', 'ax_b', $this->ax_b])
           ->andFilterWhere(['like', 'tarikh',$Date_Miladi ])
            ->andFilterWhere(['like', 'manba', $this->manba])
            ->andFilterWhere(['like', 'film', $this->film])
            ->andFilterWhere(['like', 'film_aparat', $this->film_aparat])
            ->andFilterWhere(['like', 'film_onvan', $this->film_onvan])
        ->andFilterWhere(['like', 'tbl_gorooh.onvan', $this->goroohname]);


        return $dataProvider;
    }
}

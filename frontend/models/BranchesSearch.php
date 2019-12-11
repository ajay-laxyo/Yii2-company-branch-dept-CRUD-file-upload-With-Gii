<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Branches;

/**
 * BranchesSearch represents the model behind the search form of `frontend\models\Branches`.
 */
class BranchesSearch extends Branches
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['b_id'], 'integer'],
            [['b_name', 'b_address', 'b_created_date', 'b_status', 'c_id'], 'safe'],
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
        $query = Branches::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('companiesCompany');
        // grid filtering conditions
        $query->andFilterWhere([
            'b_id' => $this->b_id,
            //'c_id' => $this->c_id,
            'b_created_date' => $this->b_created_date,
        ]);

        $query->andFilterWhere(['like', 'b_name', $this->b_name])
            ->andFilterWhere(['like', 'b_address', $this->b_address])
            ->andFilterWhere(['like', 'b_status', $this->b_status])
            ->andFilterWhere(['like', 'companies.c_name', $this->c_id]);

        return $dataProvider;
    }
}
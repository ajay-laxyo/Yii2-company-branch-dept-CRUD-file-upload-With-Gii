<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Departments;

/**
 * DepartmentsSearch represents the model behind the search form of `frontend\models\Departments`.
 */
class DepartmentsSearch extends Departments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['d_id'], 'integer'],
            [['d_name', 'd_created_date', 'd_status', 'c_c_id', 'b_b_id'], 'safe'],
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
        $query = Departments::find();

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

        $query->joinWith('companiesCompany');
        $query->joinWith('branchesBranch');

        // grid filtering conditions
        $query->andFilterWhere([
            'd_id' => $this->d_id,
            //'c_c_id' => $this->c_c_id,
            //'b_b_id' => $this->b_b_id,
            'd_created_date' => $this->d_created_date,
        ]);

        $query->andFilterWhere(['like', 'd_name', $this->d_name])
            ->andFilterWhere(['like', 'd_status', $this->d_status])
            ->andFilterWhere(['like', 'companies.c_name', $this->c_c_id])
            ->andFilterWhere(['like', 'branches.b_name', $this->b_b_id]);

        return $dataProvider;
    }
}

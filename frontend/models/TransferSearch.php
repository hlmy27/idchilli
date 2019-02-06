<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Transfer;

/**
 * TransferSearch represents the model behind the search form of `frontend\models\Transfer`.
 */
class TransferSearch extends Transfer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tx_hash'], 'integer'],
            [['status_', 'dari', 'untuk', 'message'], 'safe'],
            [['amount'], 'number'],
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
        $query = Transfer::find();

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
            'tx_hash' => $this->tx_hash,
            'amount' => $this->amount,
        ]);

        $query->andFilterWhere(['like', 'status_', $this->status_])
            ->andFilterWhere(['like', 'dari', $this->dari])
            ->andFilterWhere(['like', 'untuk', $this->untuk])
            ->andFilterWhere(['like', 'message', $this->message]);

        return $dataProvider;
    }
}

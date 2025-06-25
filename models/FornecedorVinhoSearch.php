<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FornecedorVinho;

/**
 * FornecedorVinhoSearch represents the model behind the search form of `app\models\FornecedorVinho`.
 */
class FornecedorVinhoSearch extends FornecedorVinho
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_fornecedor_vinho', 'id_fornecedor', 'id_vinho'], 'integer'],
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = FornecedorVinho::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_fornecedor_vinho' => $this->id_fornecedor_vinho,
            'id_fornecedor' => $this->id_fornecedor,
            'id_vinho' => $this->id_vinho,
        ]);

        return $dataProvider;
    }
}

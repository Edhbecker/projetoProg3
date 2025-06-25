<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MovimentoProduto;

/**
 * MovimentoProdutoSearch represents the model behind the search form of `app\models\MovimentoProduto`.
 */
class MovimentoProdutoSearch extends MovimentoProduto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_movimento_produto', 'id_vinho', 'qtd_movimento', 'fl_movimento'], 'integer'],
            [['data_movimento'], 'safe'],
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
        $query = MovimentoProduto::find();

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
            'id_movimento_produto' => $this->id_movimento_produto,
            'id_vinho' => $this->id_vinho,
            'data_movimento' => $this->data_movimento,
            'qtd_movimento' => $this->qtd_movimento,
            'fl_movimento' => $this->fl_movimento,
        ]);

        return $dataProvider;
    }
}

<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vinho;

/**
 * VinhoSearch represents the model behind the search form of `app\models\Vinho`.
 */
class VinhoSearch extends Vinho
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_vinho', 'safra', 'qtd_estoque', 'id_tipo_vinho', 'id_bodega'], 'integer'],
            [['nome'], 'safe'],
            [['preco', 'teor'], 'number'],
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
        $query = Vinho::find();

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
            'id_vinho' => $this->id_vinho,
            'safra' => $this->safra,
            'preco' => $this->preco,
            'teor' => $this->teor,
            'qtd_estoque' => $this->qtd_estoque,
            'id_tipo_vinho' => $this->id_tipo_vinho,
            'id_bodega' => $this->id_bodega,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome]);

        return $dataProvider;
    }
}

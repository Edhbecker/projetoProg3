<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fornecedor;

/**
 * FornecedorSearch represents the model behind the search form of `app\models\Fornecedor`.
 */
class FornecedorSearch extends Fornecedor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_fornecedor'], 'integer'],
            [['nome', 'contato', 'documento'], 'safe'],
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
        $query = Fornecedor::find();

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
            'id_fornecedor' => $this->id_fornecedor,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'contato', $this->contato])
            ->andFilterWhere(['like', 'documento', $this->documento]);

        return $dataProvider;
    }
}

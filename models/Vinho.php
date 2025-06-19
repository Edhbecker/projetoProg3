<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vinho".
 *
 * @property int $id_vinho
 * @property string|null $nome
 * @property int|null $safra
 * @property float|null $preco
 * @property float|null $teor
 * @property int|null $qtd_estoque
 * @property int|null $id_tipo_vinho
 * @property int|null $id_bodega
 *
 * @property Bodega $bodega
 * @property FornecedorVinho[] $fornecedorVinhos
 * @property MovimentoProduto[] $movimentoProdutos
 * @property TipoVinho $tipoVinho
 */
class Vinho extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vinho';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'safra', 'preco', 'teor', 'qtd_estoque', 'id_tipo_vinho', 'id_bodega'], 'default', 'value' => null],
            [['safra', 'qtd_estoque', 'id_tipo_vinho', 'id_bodega'], 'integer'],
            [['preco', 'teor'], 'number'],
            [['nome'], 'string', 'max' => 255],
            [['id_tipo_vinho'], 'exist', 'skipOnError' => true, 'targetClass' => TipoVinho::class, 'targetAttribute' => ['id_tipo_vinho' => 'id_tipo_vinho']],
            [['id_bodega'], 'exist', 'skipOnError' => true, 'targetClass' => Bodega::class, 'targetAttribute' => ['id_bodega' => 'id_bodega']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_vinho' => 'Id Vinho',
            'nome' => 'Nome',
            'safra' => 'Safra',
            'preco' => 'Preco',
            'teor' => 'Teor',
            'qtd_estoque' => 'Qtd Estoque',
            'id_tipo_vinho' => 'Id Tipo Vinho',
            'id_bodega' => 'Id Bodega',
        ];
    }

    /**
     * Gets query for [[Bodega]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBodega()
    {
        return $this->hasOne(Bodega::class, ['id_bodega' => 'id_bodega']);
    }

    /**
     * Gets query for [[FornecedorVinhos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFornecedorVinhos()
    {
        return $this->hasMany(FornecedorVinho::class, ['id_vinho' => 'id_vinho']);
    }

    /**
     * Gets query for [[MovimentoProdutos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMovimentoProdutos()
    {
        return $this->hasMany(MovimentoProduto::class, ['id_vinho' => 'id_vinho']);
    }

    /**
     * Gets query for [[TipoVinho]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoVinho()
    {
        return $this->hasOne(TipoVinho::class, ['id_tipo_vinho' => 'id_tipo_vinho']);
    }

}

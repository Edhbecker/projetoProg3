<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fornecedor_vinho".
 *
 * @property int $id_fornecedor_vinho
 * @property int|null $id_fornecedor
 * @property int|null $id_vinho
 *
 * @property Fornecedor $fornecedor
 * @property Vinho $vinho
 */
class FornecedorVinho extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fornecedor_vinho';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_fornecedor', 'id_vinho'], 'default', 'value' => null],
            [['id_fornecedor', 'id_vinho'], 'integer'],
            [['id_fornecedor'], 'exist', 'skipOnError' => true, 'targetClass' => Fornecedor::class, 'targetAttribute' => ['id_fornecedor' => 'id_fornecedor']],
            [['id_vinho'], 'exist', 'skipOnError' => true, 'targetClass' => Vinho::class, 'targetAttribute' => ['id_vinho' => 'id_vinho']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_fornecedor_vinho' => 'Id Fornecedor Vinho',
            'id_fornecedor' => 'Id Fornecedor',
            'id_vinho' => 'Id Vinho',
        ];
    }

    /**
     * Gets query for [[Fornecedor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFornecedor()
    {
        return $this->hasOne(Fornecedor::class, ['id_fornecedor' => 'id_fornecedor']);
    }

    /**
     * Gets query for [[Vinho]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVinho()
    {
        return $this->hasOne(Vinho::class, ['id_vinho' => 'id_vinho']);
    }

}

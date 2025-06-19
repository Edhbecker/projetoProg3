<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fornecedor".
 *
 * @property int $id_fornecedor
 * @property string|null $nome
 * @property string|null $contato
 * @property string|null $documento
 *
 * @property FornecedorVinho[] $fornecedorVinhos
 */
class Fornecedor extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fornecedor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'contato', 'documento'], 'default', 'value' => null],
            [['nome', 'contato', 'documento'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_fornecedor' => 'Id Fornecedor',
            'nome' => 'Nome',
            'contato' => 'Contato',
            'documento' => 'Documento',
        ];
    }

    /**
     * Gets query for [[FornecedorVinhos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFornecedorVinhos()
    {
        return $this->hasMany(FornecedorVinho::class, ['id_fornecedor' => 'id_fornecedor']);
    }

}

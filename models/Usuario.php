<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id_usuario
 * @property string|null $nome
 * @property int $admin
 * @property string $senha
 */
class Usuario extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'default', 'value' => null],
            [['admin', 'senha'], 'required'],
            [['admin'], 'integer'],
            [['nome', 'senha'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'nome' => 'Nome',
            'admin' => 'Admin',
            'senha' => 'Senha',
        ];
    }

}

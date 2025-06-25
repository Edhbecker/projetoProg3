<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * Modelo da tabela "usuario", com suporte à autenticação.
 */
class Usuario extends \yii\db\ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'usuario';
    }

    public function rules()
    {
        return [
            [['nome'], 'default', 'value' => null],
            [['admin', 'senha'], 'required'],
            [['admin'], 'integer'],
            [['nome', 'senha'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id_usuario' => 'ID',
            'nome' => 'Nome de Usuário',
            'admin' => 'Administrador',
            'senha' => 'Senha',
        ];
    }

    // Métodos da interface IdentityInterface

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null; // API desativada por enquanto
    }

    public static function findByUsername($username)
    {
        return self::findOne(['nome' => $username]);
    }

    public function getId()
    {
        return $this->id_usuario;
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return true;
    }

    public function validatePassword($password)
    {
        return $this->senha === $password;
    }
}

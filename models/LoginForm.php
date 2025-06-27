<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm é o modelo do formulário de login.
 */
class LoginForm extends Model
{
    public $nome;
    public $senha;
    public $rememberMe = true;

    private ?Usuario $_user = null;


    public function rules()
    {
        return [
            [['nome', 'senha'], 'required'],
            ['rememberMe', 'boolean'],
            ['senha', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->senha)) {
                $this->addError($attribute, 'Usuário ou senha incorretos.');
            }
        }
    }


    public function login()
    {
        $user = $this->getUser();
        if ($user && $this->validate()) {
            return Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        return false;
    }

    public function getUser(): ?Usuario
    {
        if ($this->_user === null) {
            $this->_user = Usuario::findByUsername($this->nome);
        }

        return $this->_user;
    }
}

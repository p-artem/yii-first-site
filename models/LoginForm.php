<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */

class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;
    public $status;

    private $_user;

    public function rules()
    {
        return [
            [['email', 'password'], 'required', 'on' => 'default'],
            ['email', 'email'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    public function  attributeLabels()
    {
        return [
            'email' => 'Эл. почта',
            'password' => 'Пароль',
            'rememberMe' =>  'Запомнить'
        ];
    }

    public function validatePassword($attribute)
    {
        if(!$this->hasErrors())
        {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password))
            {
                $this->addError($attribute, 'Неправильное имя пользователя или пароль');
            }
        }
    }

    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUseremail($this->email);
        }

        return $this->_user;
    }

    public function login()
    {
        if($this->validate())
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        else
            return false;
    }
}
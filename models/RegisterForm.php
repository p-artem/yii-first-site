<?php

namespace app\models;

use app\models\User;
use yii\base\Model;
use Yii;

class RegisterForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $status;
    public $VerifyCode;

    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'filter', 'filter' => 'trim'],
            [['username', 'email', 'password', 'VerifyCode'], 'required'],
            ['username', 'string', 'min' => 2, 'max' => 50],
            ['email', 'unique',
                'targetClass' => User::className(),
                'message' => 'Эта эл. почта уже занята',
            ],
            [['VerifyCode'], 'captcha'],
            ['status', 'default', 'value' => User::STATUS_ACTIVE, 'on' => 'default'],
            ['status', 'in', 'range' => [
                User::STATUS_NOT_ACTIVE,
                User::STATUS_ACTIVE
            ]],

        ];
    }

    public function  attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'email' => 'Эл. почта',
            'password' => 'Пароль',
            'VerifyCode' => 'Проверочный код'
        ];
    }

    public function register()
    {



            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->password =$user->setPassword($this->password);
            $user->created_at = date('Y-m-d H:i:s',time());
        if($user->save())
                return true;
    }
}
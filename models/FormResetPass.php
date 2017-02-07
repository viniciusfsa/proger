<?php
 
namespace app\models;
use Yii;
use yii\base\model;
 
class FormResetPass extends model{
 
 public $email;
 public $password;
 public $password_repeat;
 public $verification_code;
 public $recover;
     
    public function rules()
    {
        return [
            [['email', 'password', 'password_repeat', 'verification_code', 'recover'], 'required', 'message' => 'Campo requerido'],
            ['email', 'match', 'pattern' => "/^.{5,100}$/", 'message' => 'Mínimo 5 e máximo 100 caracteres'],
            ['email', 'email', 'message' => 'Formato inválido'],
            ['password', 'match', 'pattern' => "/^.{6,32}$/", 'message' => 'Mínimo 6 e máximo 32 caracteres'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => 'As senhas não coincidem'],
        ];
    }
}

<?php
namespace app\controllers;


use Yii;
use yii\web\Controller;
use yii\rbac\DbManager;


class AutorizacaoController extends Controller
{

	public function actionIniciar()
   	{
       $auth = Yii::$app->authManager;       

        // adciona a permissão "Gerenciar Usuario"
       $gerenciaCadastros = $auth->createPermission('gerenciar-cadastros');
       $gerenciaCadastros->description = 'Gerenciar Cadastros';
       $auth->add($gerenciaCadastros);
    }


}

?>
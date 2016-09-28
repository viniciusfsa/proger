<?php
//namespace app\console;
namespace app\commands;
//namespace app\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
   public function actionInit()
   {
       $auth = Yii::$app->authManager;

       //removeAll();

       
       // adciona a permissão "gerencia financiamento"
       $gerenciaFinanciamento = $auth->createPermission('gerenciar-financiamento');
       $gerenciaFinanciamento->description = 'Gerenciar Financiamento';
       $auth->add($gerenciaFinanciamento);

       // adciona a permissão "gerencia financiamento"
       $gerenciaUsuario = $auth->createPermission('gerenciar-usuario');
       $gerenciaUsuario->description = 'Gerenciar Usuario';
       $auth->add($gerenciaUsuario);



      

       // adciona a role "gerente" e da a esta role a permissão "gerenciaFinanciamento"
       $gerente = $auth->createRole('gerente');
       $auth->add($gerente);      
       $auth->addChild($gerente, $gerenciaFinanciamento);

       // adciona a role "secretario"
       $secretario = $auth->createRole('secretario');
       $auth->add($secretario);
      

       // adciona a role "admin" e da a esta role a permissão "gerenciaUsuario" e tudo que gerente faz
             
       $admin = $auth->createRole('admin');
       $auth->add($admin);     
       $auth->addChild($admin, $gerenciaUsuario); 
       $auth->addChild($admin, $gerente);
       $auth->addChild($admin, $secretario);

       // Atribui roles para usuários. 1 and 2 são IDs retornados por IdentityInterface::getId()
       // normalmente implementado no seu model User.
       
       $auth->assign($admin, 1);
       $auth->assign($gerente, 2);

       
   }
}
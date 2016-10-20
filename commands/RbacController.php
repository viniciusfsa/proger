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

       
       // adciona a permissão "Gerenciar Financiadora"
       $gerenciaFinanciadora = $auth->createPermission('gerenciar-financiadora');
       $gerenciaFinanciadora->description = 'Gerenciar Financiadora';
       $auth->add($gerenciaFinanciadora);

        // adciona a permissão "Gerenciar Instituicao"
       $gerenciaInstituicao = $auth->createPermission('gerenciar-instituicao');
       $gerenciaInstituicao->description = 'Gerenciar Instituicao';
       $auth->add($gerenciaInstituicao);

        // adciona a permissão "Gerenciar Setor"
       $gerenciaSetor = $auth->createPermission('gerenciar-setor');
       $gerenciaSetor->description = 'Gerenciar Setor';
       $auth->add($gerenciaSetor);

       // adciona a permissão "Gerenciar Usuario"
       $gerenciaUsuario = $auth->createPermission('gerenciar-usuario');
       $gerenciaUsuario->description = 'Gerenciar Usuario';
       $auth->add($gerenciaUsuario);

       // adciona a permissão "Ver cadastros basicos"
       $verCadastrosBasicos = $auth->createPermission('ver-cadastros-basicos');
       $verCadastrosBasicos->description = 'Ver Cadastros Básicos';
       $auth->add($verCadastrosBasicos);

       // adciona a permissão "Gerenciar Resolucao"
       $gerenciarResolucao = $auth->createPermission('gerenciar-resolucao');
       $gerenciarResolucao->description = 'Gerenciar Resolução';
       $auth->add($gerenciarResolucao);

       // adciona a permissão "Gerenciar Vinculos"
       $gerenciarTipoVinculo = $auth->createPermission('gerenciar-tipo-vinculo');
       $gerenciarTipoVinculo->description = 'Gerenciar Vínculos';
       $auth->add($gerenciarTipoVinculo);



      

       // adciona a role "gerente" e da a esta role as permissões criadas acima
       $gerente = $auth->createRole('gerente');
       $gerente->description = 'Gerente';
       $auth->add($gerente);      
       $auth->addChild($gerente, $gerenciaFinanciadora);
       $auth->addChild($gerente, $gerenciaInstituicao);
       $auth->addChild($gerente, $gerenciaSetor);
       $auth->addChild($gerente, $verCadastrosBasicos);
       $auth->addChild($gerente, $gerenciarResolucao);
       $auth->addChild($gerente, $gerenciarTipoVinculo);

       // adciona a role "secretario"
       $secretario = $auth->createRole('secretario');
       $secretario->description = 'Secretario';
       $auth->add($secretario);
      

       // adciona a role "admin" e da a esta role a permissão "gerenciaUsuario" e tudo que gerente faz e que secretario faz
             
       $admin = $auth->createRole('admin');

       $admin->description = 'Administrador do Sistema';
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
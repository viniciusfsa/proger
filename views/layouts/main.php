<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\rbac\DbManager;



raoul2000\bootswatch\BootswatchAsset::$theme = 'cerulean'; //aqui você vai escolher o tema a ser usado, as opções disponiveis podem ser vista no site bootswatch.com
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">




    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
    //      'brandLabel' => 'PROGER',
        'brandLabel' => '<img src ="' . Yii::$app->request->baseUrl . '/images/logo.png" />',
        'brandUrl' => Yii::$app->homeUrl, 
        'options' => [
            'class' => 'navbar navbar-inverse', //aqui você alterna entre as duas sub-opções do tema para isso use 'navbar navbar-default' ou 'navbar navbar-inverse'
        ],
    ]);


    $auth = new DbManager;
       echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                [
                    'label' => 'Gestão',
                    'items' => [
                         ['label' => 'Programa', 'url' => ['programa-proger/index']],
                         ['label' => 'Projeto', 'url' => ['projeto-proger/index']],
                         ['label' => 'Curso', 'url' => ['curso-proger/index']],
                         ['label' => 'Evento', 'url' => ['evento-proger/index']],
                      
                    ],
                    'visible' => Yii::$app->user->can('gerenciamento-cadastros-avancados') 
                ],

                [
//                        "<br><br>",

                    'label' => 'Cadastros',
                    'items' => [
                        ['label' => 'Área de Atuação', 'url' => ['area-atuacao/index'], 'visible' => Yii::$app->user->can('gerenciamento-cadastros-basicos')  ],
                         ['label' => 'Cidade', 'url' => ['cidade/index'], 'visible' => Yii::$app->user->can('gerenciamento-cadastros-basicos')  ],
                         ['label' => 'Curso', 'url' => ['curso/index'], 'visible' => Yii::$app->user->can('gerenciamento-cadastros-basicos')  ],
                         ['label' => 'Edital', 'url' => ['edital/index'], 'visible' => Yii::$app->user->can('gerenciamento-cadastros-avancados') ],
                         ['label' => 'Estado', 'url' => ['estado/index'], 'visible' => Yii::$app->user->can('gerenciamento-cadastros-basicos') ],//mudar qndo criar permissao                                                  
                         ['label' => 'Financiadora', 'url' => ['financiadora/index'], 'visible' => Yii::$app->user->can('gerenciamento-cadastros-basicos')],
                         ['label' => 'Gestor', 'url' => ['gestor/index'], 'visible' => Yii::$app->user->can('gerenciamento-cadastros-basicos')],               
                         ['label' => 'Instituição', 'url' => ['instituicao/index'], 'visible' => Yii::$app->user->can('gerenciamento-cadastros-basicos')],
                         ['label' => 'Nível de Atuação', 'url' => ['nivel-atuacao/index'], 'visible' => Yii::$app->user->can('gerenciamento-cadastros-basicos')], 
                         ['label' => 'Resolução', 'url' => ['resolucao/index'], 'visible' => Yii::$app->user->can('gerenciamento-cadastros-basicos')], 
                         ['label' => 'Setor', 'url' => ['setor/index'], 'visible' => Yii::$app->user->can('gerenciamento-cadastros-basicos')],
                         ['label' => 'Situação', 'url' => ['situacao/index'], 'visible' => Yii::$app->user->can('gerenciamento-cadastros-basicos')],           
                         ['label' => 'Tipo de Evento', 'url' => ['tipo-evento/index'], 'visible' => Yii::$app->user->can('gerenciamento-cadastros-basicos')], 
                         ['label' => 'Tipo de Função', 'url' => ['tipo-funcao/index'], 'visible' => Yii::$app->user->can('gerenciamento-cadastros-basicos')],    
                         ['label' => 'Tipo Proger', 'url' => ['tipo-proger/index'], 'visible' => Yii::$app->user->can('gerenciamento-cadastros-basicos')], 
                         ['label' => 'Vínculo', 'url' => ['tipo-vinculo/index'], 'visible' => Yii::$app->user->can('gerenciamento-cadastros-basicos')],
                         ['label' => 'Integrante (temp)', 'url' => ['integrante/index'], 'visible' => Yii::$app->user->can('gerenciamento-cadastros-basicos')],
                         ['label' => 'Pessoa (temp)', 'url' => ['pessoa/index'], 'visible' => Yii::$app->user->can('gerenciamento-cadastros-basicos')],

                    ], 
                    'visible' => Yii::$app->user->can('gerenciamento-cadastros-basicos')
                ],

                /*
                [
                    'label' => 'Cadastros Avançados',
                    'items' => [
                        
                       //  '<li class="divider"></li>',
                         //'<li class="dropdown-header">Dropdown Header</li>',
                          ['label' => 'Edital', 'url' => ['edital/index'], ],

                    ],
                    'visible' => Yii::$app->user->can('gerenciamento-cadastros-avancados')
                ],
                */


                 [
                    'label' => 'Segurança',
                    'items' => [
                         ['label' => 'Usuários', 'url' => ['usuario/index']],
                       //  '<li class="divider"></li>',
                         //'<li class="dropdown-header">Dropdown Header</li>',
                         ['label' => 'Grupos de Usuário', 'url' => ['grupos-usuario/index']],

                    ],
                    'visible' => Yii::$app->user->can('gerenciar-usuario')
                ],


                
                Yii::$app->user->isGuest ? (
                    ['label' => 'Login', 'url' => ['/site/login']]
                ) : 
                     [
                     //'label' => Yii::$app->user->identity->nome.' ('.$auth->getRole(Yii::$app->user->identity->nameGrupo)->description.')',
                     //'label' => Yii::$app->user->identity->login,//.' ('.$auth->getRole(Yii::$app->user->identity->login)->description.')',
                     'label' => 'Acesso (Sair)',
                            'items' => [
                                [
                                    'label' => 'Minha Conta',
                                    'url' => ['/usuario/minha-conta', 'id' => Yii::$app->user->identity->idUsuario],
                                    //'icon'=> '<i class="icon-arrow-up"></i>',
                                    //'options' => ['class' => 'icon-user', 'icon' => '<img src ="' . Yii::$app->request->baseUrl . '/images/sair.png" />'],
                                    'linkOptions' => ['data-method' => 'post'],
                                ],
                                [
                                    'label' => 'Sair',
                                    'url' => ['/site/logout'],
                                    //'icon'=> '<i class="icon-arrow-up"></i>',
                                    //'options' => ['class' => 'icon-user', 'icon' => '<img src ="' . Yii::$app->request->baseUrl . '/images/sair.png" />'],
                                    'linkOptions' => ['data-method' => 'post'],
                                ],
                            ],
                        ],

                [
                    'label' => 'Sobre',
                    'url' => ['site/index'],
                    //'linkOptions' => [...],
                    'visible' => Yii::$app->user->isGuest
                ],


            ],
        ]);
        NavBar::end();

    ?>


    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<div class="menu_sistema"> teste </div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <b>Universidade Estadual de Feira de Santana  </b> <?= date('Y') ?></p>

        <p class="pull-right">Desenvolvido por: <b>Assessoria Especial de Informática - Gerência de Desenvolvimento</b></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

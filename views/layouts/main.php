<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\rbac\DbManager;

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
        //'brandLabel' => 'PROGER',
        'brandLabel' => '<img src ="' . Yii::$app->request->baseUrl . '/images/logo.png" />',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $auth = new DbManager;
       echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [

                
                [
                    'label' => 'Cadastros Básicos',
                    'items' => [
                         ['label' => 'Setor', 'url' => ['setor/index'], 'visible' => Yii::$app->user->can('gerenciar-setor')],
                         ['label' => 'Instituicao', 'url' => ['instituicao/index'],'visible' => Yii::$app->user->can('gerenciar-instituicao')],
                         ['label' => 'Financiadora', 'url' => ['financiadora/index'], 'visible' => Yii::$app->user->can('gerenciar-financiadora')],   
                         ['label' => 'Vínculos', 'url' => ['tipo-vinculo/index'], 'visible' => Yii::$app->user->can('gerenciar-financiadora')],//a modificar - jhone
                         ['label' => 'Resolução', 'url' => ['resolucao/index'], 'visible' => Yii::$app->user->can('gerenciar-financiadora')], //a modificar - jhone      
                    ], 
                    'visible' => Yii::$app->user->can('ver-cadastros-basicos')
                ],


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
                     'label' => Yii::$app->user->identity->login,//.' ('.$auth->getRole(Yii::$app->user->identity->login)->description.')',
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

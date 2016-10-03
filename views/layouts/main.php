<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
        'brandLabel' => 'PROGER',
        'brandUrl' => Yii::$app->homeUrl,
        'brandLogo' =>  
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
            'src' => 'nome2.png',
        ],
    ]);
    ?>

    <div class="menu_sistema"> teste <br><br><br><br><br><br></div>
    <?php
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => ["<br><br>",
            ['label' => 'Relatórios',
                 'items' => [
                      ['label' => 'Catálogo de materiais', 'url' => '#'],
                      ['label' => 'Localização de materiais', 'url' => '#'],
                      '<li class="divider"></li>',
                      '<li class="dropdown-header">Financeiro</li>',
                      ['label' => 'Balancete contábil', 'url' => '#'],
                      ['label' => 'Demonstrativo físico-financeiro', 'url' => '#'],
                            ]
            ],
            ['label' => 'Sobre', 'url' => ['/site/about']],
            ['label' => 'Contato', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Acesso', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
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
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

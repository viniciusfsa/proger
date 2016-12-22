<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProjetoProger */

$this->title = 'Atualizar Projeto: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Projetos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'nome' => $model->nome]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="projeto-proger-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

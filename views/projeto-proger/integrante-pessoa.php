<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Integrante */

//model == projeto

$this->title = 'Cadastrar Integrante';
$this->params['breadcrumbs'][] = ['label' => 'Projetos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nomeProjeto, 'url' => ['view', 'nome' => $model->nomeProjeto]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="integrante-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-integrante-pessoa', [
        'model' => $model,
    ]) ?>

</div>
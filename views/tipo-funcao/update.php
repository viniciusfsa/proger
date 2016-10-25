<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tipoFuncao */

$this->title = 'Atualizar Tipo de Função: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tipo de Função', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="tipo-funcao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

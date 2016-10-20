<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Resolucao */

$this->title = 'Atualizar Resolução: ' . $model->numero;
$this->params['breadcrumbs'][] = ['label' => 'Resoluções', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->numero, 'url' => ['view', 'numero' => $model->numero]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="resolucao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

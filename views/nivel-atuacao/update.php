<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NivelAtuacao */

$this->title = 'Atualizar Nível Atuação: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Nivel Atuacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nivel-atuacao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

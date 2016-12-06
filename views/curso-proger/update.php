<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CursoProger */

$this->title = 'Atualizar Curso Proger: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Curso Proger', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="curso-proger-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

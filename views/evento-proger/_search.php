<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\EventoPorger */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evento-proger-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'descricao') ?>

    <?= $form->field($model, 'idTipoEvento') ?>

    <?= $form->field($model, 'idSituacao') ?>

    <?php // echo $form->field($model, 'idAreaAtuacao') ?>

    <?php // echo $form->field($model, 'dataInicio') ?>

    <?php // echo $form->field($model, 'dataFim') ?>

    <?php // echo $form->field($model, 'cargaHoraria') ?>

    <?php // echo $form->field($model, 'numeroParticipantes') ?>

    <?php // echo $form->field($model, 'observacoes') ?>

    <?php // echo $form->field($model, 'idTipoProger') ?>

    <?php // echo $form->field($model, 'idProger') ?>

    <?php // echo $form->field($model, 'idGestor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

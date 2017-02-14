<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\Integrante */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="integrante-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idTipoVinculo') ?>

    <?= $form->field($model, 'idTipoFuncao') ?>

    <?= $form->field($model, 'idInstituicao') ?>

    <?= $form->field($model, 'idSetor') ?>

    <?php // echo $form->field($model, 'idCurso') ?>

    <?php // echo $form->field($model, 'idPessoa') ?>

    <?php // echo $form->field($model, 'dataInicio') ?>

    <?php // echo $form->field($model, 'dataFim') ?>

    <?php // echo $form->field($model, 'ativo') ?>

    <?php // echo $form->field($model, 'matricula') ?>

    <?php // echo $form->field($model, 'cargaHoraria') ?>

    <?php // echo $form->field($model, 'idTipoProger') ?>

    <?php // echo $form->field($model, 'idProger') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

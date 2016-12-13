<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjetoProgerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projeto-proger-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'descricao') ?>

    <?= $form->field($model, 'idSituacao') ?>

    <?= $form->field($model, 'idAreaAtuacao') ?>

    <?php // echo $form->field($model, 'idSetor') ?>

    <?php // echo $form->field($model, 'idPrograma') ?>

    <?php // echo $form->field($model, 'interdepartamental') ?>

    <?php // echo $form->field($model, 'interrinstituicional') ?>

    <?php // echo $form->field($model, 'dataInicio') ?>

    <?php // echo $form->field($model, 'dataFim') ?>

    <?php // echo $form->field($model, 'observacoes') ?>

    <?php // echo $form->field($model, 'idGestor') ?>

    <div class="form-group">
        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Redefinir', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

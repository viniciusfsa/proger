<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Instituicao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="instituicao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'instituicao')->textInput() ?>

    <?= $form->field($model, 'idPais')->textInput() ?>

    <?= $form->field($model, 'ativo')->textInput() ?>

    <?= $form->field($model, 'sigla')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

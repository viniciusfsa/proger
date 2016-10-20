<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Resolucao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resolucao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'numero')->textInput() ?>

    <?= $form->field($model, 'assunto')->textInput() ?>

    <?= $form->field($model, 'dataResolucao')->textInput() ?>

    <?= $form->field($model, 'dataPublicacao')->textInput() ?>

    <?= $form->field($model, 'observacao')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

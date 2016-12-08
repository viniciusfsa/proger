<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Edital */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edital-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' =>50,'style' =>'width: 50%']) ?>

    <?= $form->field($model, 'ano')->textInput(['maxlength' =>4,'style' =>'width: 15%', 'onlynumber' => 'true' ]) ?>

    <?= $form->field($model, 'numero')->textInput(['maxlength' =>20,'style' =>'width: 15%' ]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

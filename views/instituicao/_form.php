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

    <?= $form->field($model, 'pais')->textInput() ?>

    <?= $form->field($model, 'ativo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

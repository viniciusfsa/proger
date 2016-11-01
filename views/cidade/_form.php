<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use app\models\Estado;
/* @var $this yii\web\View */
/* @var $model app\models\Cidade */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cidade-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput() ?>

    <?= $form->field($model, 'idEstado')->dropDownList(ArrayHelper::map(Estado::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione um Estado'])  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

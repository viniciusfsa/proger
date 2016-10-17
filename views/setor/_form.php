<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Setor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput() ?>

    <?= $form->field($model, 'sigla')->textInput() ?>

    <?= //$form->field($model, 'ativo')->textInput() 
    $form->field($model, 'ativo')->radioList(array('1'=>'Sim',0=>'Não'));

    ?>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

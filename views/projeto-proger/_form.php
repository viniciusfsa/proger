<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\ProjetoProger */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projeto-proger-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' =>20,'style' =>'width: 50%']) ?>

    <?= $form->field($model, 'descricao')->textArea(['maxlength' =>500,'style' =>'width: 50%' ])?>

    <?= $form->field($model, 'idSituacao')->textInput() ?>

    <?= $form->field($model, 'idAreaAtuacao')->textInput() ?>

    <?= $form->field($model, 'idSetor')->textInput() ?>

    <?= $form->field($model, 'idPrograma')->textInput(); ?>
    <?php //pondo valor radiolists default para sim
        $model->isNewRecord ? $model->interdepartamental = 1: $model->interdepartamental = $model->interdepartamental ; ?>    
    <?= $form->field($model, 'interdepartamental')->radioList(array('1'=>'Sim','0'=>'Não')) ?>

    <?php $model->isNewRecord ? $model->interrinstituicional = 1: $model->interrinstituicional = $model->interrinstituicional ;  ?>
    <?= $form->field($model, 'interrinstituicional')->radioList(array('1'=>'Sim','0'=>'Não')) ?>

    <?= $form->field($model, 'dataInicio', ['options' => ['style' =>'width: 20%']])->widget(DatePicker::classname(),
        ['options' => ['placeholder' => ''],
          'value' => date('d-M-Y'),
          'type' => DatePicker::TYPE_COMPONENT_APPEND,
          
          'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd/mm/yyyy',
            'todayHighlight' => true,
          ]
        ]); ?>

    <?= $form->field($model, 'dataFim', ['options' => ['style' =>'width: 20%']])->widget(DatePicker::classname(),
        ['options' => ['placeholder' => ''],
          'value' => date('d-M-Y'),
          'type' => DatePicker::TYPE_COMPONENT_APPEND,
          
          'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd/mm/yyyy',
            'todayHighlight' => true,
          ]
        ]); ?>

    <?= $form->field($model, 'observacoes')->textArea(['maxlength' =>500,'style' =>'width: 50%' ]) ?>

    <?= $form->field($model, 'idGestor')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

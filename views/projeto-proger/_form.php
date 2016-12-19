<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker;
use app\models\Situacao;
use app\models\AreaAtuacao;
use app\models\Setor;
use app\models\ProgramaProger;
use app\models\Gestor;
/* @var $this yii\web\View */
/* @var $model app\models\ProjetoProger */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projeto-proger-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' =>20,'style' =>'width: 50%']) ?>

    <?= $form->field($model, 'descricao')->textArea(['maxlength' =>500,'style' =>'width: 50%' ])?>

    <?= $form->field($model, 'idSituacao')->dropDownList(ArrayHelper::map(Situacao::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione uma situação', 'style' =>'width: 50%']) ?>

    <?= $form->field($model, 'idAreaAtuacao')->dropDownList(ArrayHelper::map(AreaAtuacao::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione uma área de atuação', 'style' =>'width: 50%']) ?>

    <?= $form->field($model, 'idSetor')->dropDownList(ArrayHelper::map(Setor::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione um setor', 'style' =>'width: 50%']) ?>

    <?= $form->field($model, 'idPrograma')->dropDownList(ArrayHelper::map(ProgramaProger::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione um programa', 'style' =>'width: 50%']) ?>
    <?php //pondo valor radiolists default para sim
        $model->isNewRecord ? $model->interdepartamental = 1: $model->interdepartamental = $model->interdepartamental ; ?>    
    <?= $form->field($model, 'interdepartamental')->radioList(array('1'=>'Sim','0'=>'Não')) ?>

    <?php $model->isNewRecord ? $model->interinstitucional = 1: $model->interinstitucional = $model->interinstitucional ;  ?>
    <?= $form->field($model, 'interinstitucional')->radioList(array('1'=>'Sim','0'=>'Não')) ?>

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

    <?= $form->field($model, 'idGestor')->dropDownList(ArrayHelper::map(Gestor::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione um gestor', 'style' =>'width: 50%']) ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker;
use app\models\TipoVinculo;
use app\models\TipoFuncao;
use app\models\Instituicao;
use app\models\Setor;
use app\models\Curso; 
use app\models\Cidade; 
use app\models\Estado; 

/* @var $this yii\web\View */
/* @var $model app\models\Integrante */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="integrante-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idTipoVinculo')->dropDownList(ArrayHelper::map(TipoVinculo::find()->orderBy('descricao')->all(),'id', 'descricao'),['prompt'=>'Selecione um vínculo', 'style' =>'width: 50%']) ?>

    <?= $form->field($model, 'idTipoFuncao')->dropDownList(ArrayHelper::map(TipoFuncao::find()->orderBy('descricao')->all(),'id', 'descricao'),['prompt'=>'Selecione uma função', 'style' =>'width: 50%']) ?>

    <?= $form->field($model, 'idInstituicao')->dropDownList(ArrayHelper::map(Instituicao::find()->orderBy('instituicao')->all(),'id', 'instituicao'),['prompt'=>'Selecione uma instituição', 'style' =>'width: 50%']) ?>

    <?= $form->field($model, 'idSetor')->dropDownList(ArrayHelper::map(Setor::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione um setor', 'style' =>'width: 50%']) ?>

    <?= $form->field($model, 'idCurso')->dropDownList(ArrayHelper::map(Curso::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione um curso', 'style' =>'width: 50%']) ?>

    <?php $modelPessoa = new app\models\Pessoa; ?>

    <!-- PESSOA    -->

    <?= $form->field($modelPessoa, 'cpf')->textInput(['maxlength' =>15,'style' =>'width: 50%', 'placeholder'=>'Apenas números']) ?>

    <?= $form->field($modelPessoa, 'nome')->textInput(['maxlength' =>100,'style' =>'width: 50%']) ?>

    <?= $form->field($modelPessoa, 'rg')->textInput(['maxlength' =>20,'style' =>'width: 50%', 'placeholder'=>'Apenas números']) ?>

    <?= $form->field($modelPessoa, 'email')->textInput(['maxlength' =>45,'style' =>'width: 50%']) ?>

    <?= $form->field($modelPessoa, 'telefone')->textInput(['maxlength' =>11, 'minlength' =>10, 'style' =>'width: 50%', 'placeholder'=>'Apenas números incluindo o DDD']) ?>

    <?= $form->field($modelPessoa, 'celular')->textInput(['maxlength' =>11, 'minlength' =>10, 'style' =>'width: 50%', 'placeholder'=>'Apenas números incluindo o DDD']) ?>

    <?= $form->field($modelPessoa, 'rua')->textInput(['maxlength' =>100,'style' =>'width: 50%']) ?>

    <?= $form->field($modelPessoa, 'numero')->textInput(['maxlength' =>10,'style' =>'width: 50%', 'placeholder'=>'Apenas números']) ?>

    <?= $form->field($modelPessoa, 'bairro')->textInput(['maxlength' =>45,'style' =>'width: 50%']) ?>

    <?= $form->field($modelPessoa, 'cep')->textInput(['maxlength' =>8,'style' =>'width: 50%', 'placeholder'=>'Apenas números']) ?>

    <?= $form->field($modelPessoa, 'idEstado')->dropDownList(ArrayHelper::map(Estado::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione um estado', 'style' =>'width: 50%']) ?> 
    
    <?= $form->field($modelPessoa, 'idCidade')->dropDownList(ArrayHelper::map(Cidade::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione uma cidade', 'style' =>'width: 50%']) ?> 

    <div class="form-group", style ="width: 50%">
            <label>Duração: </label>
            <?php
                echo DatePicker::widget([
                    'model' => $model,
                    'attribute' => 'dataInicio',
                    'attribute2' => 'dataFim',
                    'options' => ['placeholder' => 'Data Inicial'],
                    'options2' => ['placeholder' => 'Data Final'],
                    'type' => DatePicker::TYPE_RANGE,
                    'form' => $form,
                    'separator' => ' até ',
                    'pluginOptions' => [
                        'format' => 'dd/mm/yyyy',
                        'autoclose' => true,
                    ],
                ]);
            ?>
        </div>

    <!-- /PESSOA    -->

    <?php $model->ativo = 1; ?>
    <?= //$form->field($model, 'ativo')->textInput()     
    $form->field($model, 'ativo')->radioList(array('1'=>'Sim','0'=>'Não'));
    ?>

    <?= $form->field($model, 'matricula')->textInput(['maxlength' =>15,'style' =>'width: 50%', 'placeholder'=>'Apenas números']) ?>

    <?= $form->field($model, 'cargaHoraria')->textInput(['maxlength' =>4,'style' =>'width: 50%', 'placeholder'=>'Apenas números']) ?>

    <?= $form->field($model, 'idTipoProger')->textInput() ?>

    <?= $form->field($model, 'idProger')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

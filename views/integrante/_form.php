<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
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

    <?= $form->field($model, 'idPessoa')->textInput() ?>

    <?php $modelPessoa = new app\models\Pessoa; ?>

    <?= $form->field($modelPessoa, 'cpf')->textInput() ?>

    <?= $form->field($modelPessoa, 'rg')->textInput() ?>

    <?= $form->field($modelPessoa, 'email')->textInput() ?>

    <?= $form->field($modelPessoa, 'telefone')->textInput() ?>

    <?= $form->field($modelPessoa, 'celular')->textInput() ?>

    <?= $form->field($modelPessoa, 'rua')->textInput() ?>

    <?= $form->field($modelPessoa, 'numero')->textInput() ?>

    <?= $form->field($modelPessoa, 'bairro')->textInput() ?>

    <?= $form->field($modelPessoa, 'cep')->textInput() ?>

    <?= $form->field($modelPessoa, 'idEstado')->dropDownList(ArrayHelper::map(Estado::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione um estado', 'style' =>'width: 50%']) ?> 

    <?= $form->field($modelPessoa, 'idCidade')->dropDownList(ArrayHelper::map(Cidade::find()->where(['idEstado' => $modelPessoa->idEstado])->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione uma cidade', 'style' =>'width: 50%']) ?> 

    



    <?= $form->field($model, 'dataInicio')->textInput() ?>

    <?= $form->field($model, 'dataFim')->textInput() ?>

    <?= $form->field($model, 'ativo')->textInput() ?>

    <?= $form->field($model, 'matricula')->textInput() ?>

    <?= $form->field($model, 'cargaHoraria')->textInput() ?>

    <?= $form->field($model, 'idTipoProger')->textInput() ?>

    <?= $form->field($model, 'idProger')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

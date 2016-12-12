<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use app\models\Situacao;
use app\models\AreaAtuacao;
use app\models\Setor;
use app\models\Gestor;
use nex\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\ProgramaProger */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programa-proger-form"> 

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textarea(['maxlength' =>300,'style' =>'width: 50%' ]) ?>

    <?= $form->field($model, 'descricao')->textarea(['maxlength' =>500,'style' =>'width: 50%' ]) ?>

    <?= $form->field($model, 'idSituacao')->dropDownList(ArrayHelper::map(Situacao::find()->orderBy('nome')->all(),'id', 'nome'),['style' =>'width: 50%', 'default' => '1']) ?>

    <?= $form->field($model, 'idAreaAtuacao')->dropDownList(ArrayHelper::map(AreaAtuacao::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione uma Área de Atuação', 'style' =>'width: 50%'])  ?>

    <?= $form->field($model, 'idSetor')->dropDownList(ArrayHelper::map(Setor::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione um Setor', 'style' =>'width: 50%']) ?>

    <?= $form->field($model, 'interdepartamental')->radioList(array('1'=>'Sim',0=>'Não')) ?>

    <?= $form->field($model, 'interinstitucional')->radioList(array('1'=>'Sim',0=>'Não')) ?>

   
    <?= $form->field($model, 'dataInicio')->widget(\yii\jui\DatePicker::classname(), [
        'language' => 'pt-br',
        'dateFormat' => 'dd/MM/yyyy' ]) ?>

    <?= $form->field($model, 'dataFim')->widget(\yii\jui\DatePicker::classname(), [
        'language' => 'pt-br',
        'dateFormat' => 'dd/MM/yyyy' ]) ?>

    
    <?= $form->field($model, 'observacoes')->textarea(['maxlength' =>500,'style' =>'width: 50%' ]) ?>

   
    <?= $form->field($model, 'idGestor')->dropDownList(ArrayHelper::map(Gestor::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione um Setor Gestor', 'style' =>'width: 50%']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

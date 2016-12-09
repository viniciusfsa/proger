<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use app\models\TipoEvento;
use app\models\Situacao;
use app\models\AreaAtuacao;
use app\models\TipoProger;
use app\models\Gestor;
use nex\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\EventoProger */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evento-proger-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' =>50,'style' =>'width: 50%' ]) ?>

    <?= $form->field($model, 'descricao')->textArea(['maxlength' =>500, 'style' => 'height:100px' ]) ?>

    <?= $form->field($model, 'idTipoEvento')->dropDownList(ArrayHelper::map(TipoEvento::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione um Tipo de Evento se necessário', 'style' =>'width: 50%'])  ?>  

    <?= $form->field($model, 'idSituacao')->dropDownList(ArrayHelper::map(Situacao::find()->orderBy('nome')->all(),'id', 'nome'),['style' =>'width: 50%', 'default' => '1'])  ?> 

    <?= $form->field($model, 'idAreaAtuacao')->dropDownList(ArrayHelper::map(AreaAtuacao::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione uma Área de Atuação se necessário', 'style' =>'width: 50%'])  ?>

    <?= $form->field($model, 'dataInicio')->widget(\yii\jui\DatePicker::classname(), [
        'language' => 'pt-br',
        'dateFormat' => 'dd/MM/yyyy',
    ]) ?>

    <?= $form->field($model, 'dataFim')->widget(\yii\jui\DatePicker::classname(), [
        'language' => 'pt-br',
        'dateFormat' => 'dd/MM/yyyy',
    ]) ?>

    
    <?= $form->field($model, 'cargaHoraria')->textInput(['maxlength' =>4,'style' =>'width: 20%', 'onlynumber' => 'true' ]) ?>

    <?= $form->field($model, 'numeroParticipantes')->textInput(['maxlength' =>8,'style' =>'width: 20%', 'onlynumber' => 'true' ]) ?>

    <?= $form->field($model, 'observacoes')->textArea(['maxlength' =>500, 'style' => 'height:100px' ]) ?>

    <?= $form->field($model, 'idTipoProger')->dropDownList(ArrayHelper::map(TipoProger::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione um tipo de vínculo se necessário', 'style' =>'width: 50%'])  ?> 

    <?= $form->field($model, 'idGestor')->dropDownList(ArrayHelper::map(Gestor::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione um Gestor', 'style' =>'width: 50%'])  ?> 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

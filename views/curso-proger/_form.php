<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Gestor;
use app\models\AreaAtuacao;
use app\models\Situacao;
use app\models\Setor;
use app\models\TipoProger;
use \yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker;
//use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\CursoProger */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="curso-proger-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= 
        $form->field($model, 'nome')->textInput(['maxlength' =>150,'style' =>'width: 50%' ]) 
    ?>
    <?= 
        //$form->field($model, 'descricao')->textInput(['maxlength' =>500,'style' =>'width: 50%' ])
        $form->field($model, 'descricao')->textarea(['maxlength' =>500,'style' =>'width: 50%' ])  
    ?>

    <?= 
        //$form->field($model, 'idSituacao')->textInput() 
        $form->field($model, 'idSituacao')->dropDownList(ArrayHelper::map(Situacao::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione uma Situacao', 'style' =>'width: 50%']) 
    ?>

    <?= 
        //$form->field($model, 'idAreaAtuacao')->textInput() 
        $form->field($model, 'idAreaAtuacao')->dropDownList(ArrayHelper::map(AreaAtuacao::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione uma Area de Atuação', 'style' =>'width: 50%']) 
    ?>

    <?= 
        //$form->field($model, 'idSetor')->textInput() 
        $form->field($model, 'idSetor')->dropDownList(ArrayHelper::map(Setor::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione um Setor', 'style' =>'width: 50%']) 
    ?>

    <?= 
        //$form->field($model, 'interdepartamental')->textInput() 
        $form->field($model, 'interdepartamental')->radioList(array('1'=>'Sim',0=>'Não')); 
    ?>

    <?= 
        //$form->field($model, 'interinstitucional')->textInput() 
        $form->field($model, 'interinstitucional')->radioList(array('1'=>'Sim',0=>'Não')); 
    ?>

    <?= 
        $form->field($model, 'cargaHoraria')->textInput(['maxlength' =>5,'style' =>'width: 20%', 'onlynumber' => 'true']) 
    ?>

    <?= $form->field($model, 'dataInicio', ['options' => ['style' =>'width: 20%']])->widget(DatePicker::classname(),
        ['options' => ['placeholder' => ''],
          'value' => date('d-M-Y'),
          'type' => DatePicker::TYPE_COMPONENT_APPEND,
          
          'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd/mm/yyyy',
            'todayHighlight' => true,
          ]
        ]);
    ?>

    <?= $form->field($model, 'dataFim', ['options' => ['style' =>'width: 20%']])->widget(DatePicker::classname(),
        ['options' => ['placeholder' => ''],
          'value' => date('d-M-Y'),
          'type' => DatePicker::TYPE_COMPONENT_APPEND,
          
          'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd/mm/yyyy',
            'todayHighlight' => true,
          ]
        ]);
    ?>
  

    <?= 
        //$form->field($model, 'observacoes')->textInput(['maxlength' =>500,'style' =>'width: 50%' ]) 
        $form->field($model, 'observacoes')->textarea(['maxlength' =>500,'style' =>'width: 50%' ])  
    ?>

    <?= 
        //$form->field($model, 'idTipoProger')->textInput() 
        $form->field($model, 'idTipoProger')->dropDownList(ArrayHelper::map(TipoProger::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione o Tipo', 'style' =>'width: 50%']) 
    ?>

    <?= $form->field($model, 'idProger')->textInput(['style' =>'width: 50%']) ?>

    <?= 
        //$form->field($model, 'idGestor')->textInput()
        $form->field($model, 'idGestor')->dropDownList(ArrayHelper::map(Gestor::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione um Gestor', 'style' =>'width: 50%']) 
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

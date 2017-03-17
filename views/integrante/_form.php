<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker;
use yii\widgets\MaskedInput;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use app\models\TipoVinculo;
use app\models\TipoFuncao;
use app\models\Instituicao;
use app\models\Setor;
use app\models\Curso; 
use app\models\Cidade; 
use app\models\Estado; 
use app\models\Pessoa; 

$pessoa = new Pessoa();

/* @var $this yii\web\View */
/* @var $model app\models\Integrante */
/* @var $form yii\widgets\ActiveForm */
?>

<script language="javascript">
        window.onload = function(){
        buscarCpf();
        }
 

    function buscarCpf(){

        if($('#integrante-cpf').val().length == 0){
            $("#resultadoErro").empty();
          //  $("#inputError").html('<strong style="color: #E62E2E">Informe um CPF válido</strong>');    
            $("#loginGerado").empty();     
        }
        else{
             $("#resultadoErro").empty();
              $("#inputError").empty();              
            //document.getElementById('corredorcadastro-login').value=document.getElementById('corredorcadastro-cpf').value; // Limpa o campo
              var request = $.ajax({
                url: "<?= Yii::$app->urlManager->createUrl('pessoa/buscar-cpf'); ?>",
                //data: 'login=' +$("#login").val(),
                data: "cpf="+$("#integrante-cpf").val(),
               // dataType : "text",
                type: 'POST',
            });  

                
            request.done(function(msg) { 
                console.log(msg)
                
                
                //alert(msg);
                if((msg != 0)&&(msg != -1 )){     
                    $model->idPessoa = $msg;
                $("#loginGerado").empty();
                }
                else if(msg == 0){
                   $("#inputError").html('<strong style="color: #E62E2E">Informe um CPF Válido</strong>');    
                   document.getElementById('integrante-cpf').value=''; // Limpa o campo
                   $("#loginGerado").empty();
                   $("#integrante-cpf").focus();
                }
                else if(msg == -1){
                   $("#inputError").empty();
                   $("#inputError").html('<strong style="color: #A62E2E">CPF não cadastrado!</strong>');
                   document.getElementById('integrante-cpf').value=''; // Limpa o campo
                   $("#loginGerado").html(document.getElementById('integrante-cpf').value);   
                   $("#integrante-cpf").focus();


                }
            });
            request.fail(function(jqXHR, textStatus) {
                console.log("Request failed: " + textStatus);
            });     
        }
    }

    function SomenteNumero(e){
        var tecla=(window.event)?event.keyCode:e.which;   
        if((tecla>47 && tecla<58)) return true;
        else{
            if (tecla==8 || tecla==0) return true;
        else  return false;
        }
    }

    
   
</script>



<div class="integrante-form">

    <?php $form = ActiveForm::begin(); ?>

    <div id="resultadoErro"></div>

        <div  align="left" id="loginGerado"></div>           
    

    

    <div id="resultado"></div>
    

     <div class="form-group", style ="width: 50%">
        <label>Duração: </label>
        <?php
            echo $form->field($pessoa, 'cpf')->
            textInput(['maxlength' =>11,'style' =>'width: 100%','onBlur' => 'js:buscarLogin();', 'onkeypress'=> 'js:SomenteNumero(event);' ]);
            echo Html::button('+', ['value'=>Url::to('index.php?r=pessoa/create'),'class' => 'btn btn-primary', 'id'=>'modalButton']);   ?>
    </div>

    <?php 
        Modal::begin([
                'header'=>'<h4>Cadastrar Pessoa</h4>',
                'id'=> 'modal',
                'size'=> 'modal-lg',
            ]);

        echo "<div id='modalContent'></div>";
        Modal::end();
    ?>
            
       

    <?= $form->field($model, 'idTipoVinculo')->dropDownList(ArrayHelper::map(TipoVinculo::find()->orderBy('descricao')->all(),'id', 'descricao'),['prompt'=>'Selecione um vínculo', 'style' =>'width: 50%']) ?>

    <?= $form->field($model, 'idTipoFuncao')->dropDownList(ArrayHelper::map(TipoFuncao::find()->orderBy('descricao')->all(),'id', 'descricao'),['prompt'=>'Selecione uma função', 'style' =>'width: 50%']) ?>

    <?= $form->field($model, 'idInstituicao')->dropDownList(ArrayHelper::map(Instituicao::find()->orderBy('instituicao')->all(),'id', 'instituicao'),['prompt'=>'Selecione uma instituição', 'style' =>'width: 50%']) ?>

    <?= $form->field($model, 'idSetor')->dropDownList(ArrayHelper::map(Setor::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione um setor', 'style' =>'width: 50%']) ?>

    <?= $form->field($model, 'idCurso')->dropDownList(ArrayHelper::map(Curso::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione um curso', 'style' =>'width: 50%']) ?>

    <?php $model->ativo = 1; ?>
    <?= //$form->field($model, 'ativo')->textInput()     
    $form->field($model, 'ativo')->radioList(array('1'=>'Sim','0'=>'Não'));
    ?>

    <?= $form->field($model, 'matricula')->textInput(['maxlength' =>15,'style' =>'width: 50%', 'placeholder'=>'Apenas números']) ?>

    <?= $form->field($model, 'cargaHoraria')->textInput(['maxlength' =>4,'style' =>'width: 50%', 'placeholder'=>'Apenas números']) ?>
    
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

    <?= $form->field($model, 'idTipoProger')->textInput() ?>

    <?= $form->field($model, 'idProger')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

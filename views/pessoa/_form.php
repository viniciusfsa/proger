<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use yii\widgets\MaskedInput;
use yii\helpers\Url;
use app\models\Cidade; 
use app\models\Estado; 

/* @var $this yii\web\View */
/* @var $model app\models\Pessoa */
/* @var $form yii\widgets\ActiveForm */
?>

<script language="javascript">
        window.onload = function(){
        buscarCpf();
        }
 

    function buscarCpf){

        if($('#pessoa-cpf').val().length == 0){
            $("#resultadoErro").empty();
          //  $("#inputError").html('<strong style="color: #E62E2E">Informe um CPF válido</strong>');    
            $("#loginGerado").empty();   
            document.getElementById('corredorcadastro-login').value='';    
        }
        else{
             $("#resultadoErro").empty();
              $("#inputError").empty();              
            //document.getElementById('corredorcadastro-login').value=document.getElementById('corredorcadastro-cpf').value; // Limpa o campo
              var request = $.ajax({
                url: "<?= Yii::$app->urlManager->createUrl('usuario/buscar-login'); ?>",
                //data: 'login=' +$("#login").val(),
                data: "login="+$("#corredorcadastro-cpf").val(),
               // dataType : "text",
                type: 'POST',
            });  

                
            request.done(function(msg) { 
                console.log(msg)
                
                //alert(msg);
                if(msg == 2){     
                $("#inputError").html('<strong style="color: #E62E2E">Já existe cadastro para o CPF informado</strong>');    
                //$('#create').attr('disabled', 'disabled');         
                document.getElementById('corredorcadastro-cpf').value=''; // Limpa o campo
                document.getElementById('corredorcadastro-login').value='';
                $("#loginGerado").empty();
                $("#corredorcadastro-cpf").focus();
                }
                else if(msg == 0){
                   $("#inputError").html('<strong style="color: #E62E2E">Informe um CPF Válido</strong>');    
                   document.getElementById('corredorcadastro-cpf').value=''; // Limpa o campo
                   document.getElementById('corredorcadastro-login').value='';
                   $("#loginGerado").empty();
                   $("#corredorcadastro-cpf").focus();
                }
                else if(msg == 1){
                   $("#inputError").empty();
                  // $("#inputError").html('<strong style="color: #A62E2E">CPF liberado</strong>');
                   $("#loginGerado").html(document.getElementById('corredorcadastro-cpf').value);   
                   document.getElementById('corredorcadastro-login').value=document.getElementById('corredorcadastro-cpf').value;

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

<div class="pessoa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cpf')->textInput(['maxlength' =>15,'style' =>'width: 50%', 'placeholder'=>'Apenas números']) ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' =>100,'style' =>'width: 50%']) ?>

    <?= $form->field($model, 'rg')->textInput(['maxlength' =>20,'style' =>'width: 50%', 'placeholder'=>'Apenas números']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' =>45,'style' =>'width: 50%']) ?>

    <?= $form->field($model, 'telefone')->textInput(['maxlength' =>11, 'minlength' =>10, 'style' =>'width: 50%', 'placeholder'=>'Apenas números incluindo o DDD']) ?>

    <?= $form->field($model, 'celular')->widget(
                MaskedInput::classname(), [                    
                    //'model' =>$model,
                    //'attribute' => 'cecular',
                    'name' => 'celular',
                    'mask' => '(99) 99999-9999'
                ]); ?>

    <?= $form->field($model, 'rua')->textInput(['maxlength' =>100,'style' =>'width: 50%']) ?>

    <?= $form->field($model, 'numero')->textInput(['maxlength' =>10,'style' =>'width: 50%', 'placeholder'=>'Apenas números']) ?>

    <?= $form->field($model, 'bairro')->textInput(['maxlength' =>45,'style' =>'width: 50%']) ?>

    <div class="pessoa-form" style="width: 50%">
    <?= $form->field($model, 'cep')->widget(
                MaskedInput::classname(), [                    
                    'model' =>$model,
                    'attribute' => 'cep',
                    'name' => 'cep',
                    'mask' => '99999-999'
                ]);
            ?>
    </div>

    <div class="row">
        <div class="col-sm-3 col-md-3">
            
            <?php
                $estado = ArrayHelper::map(Estado::find()->all(), 'id', 'nome');
                echo $form->field($model, 'idEstado')->dropDownList(
                        $estado,
                        [
                            'prompt'=>'Selecione um estado',
                            'onchange'=>'
                                $.get( "'.Url::toRoute('/integrante/cidade').'", { id: $(this).val() } )
                                    .done(function( data ) {
                                        $( "#'.Html::getInputId($model, 'idCidade').'" ).html( data );
                                    }
                                );
                            '    
                        ]
                ); 
            ?>
        </div>


        <div class="col-sm-3 col-md-3">
            

            <?=
                $form->field($model, 'idCidade')->dropDownList(['prompt'=>'Selecione um estado primeiro']) 
            ?>
        </div>        
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

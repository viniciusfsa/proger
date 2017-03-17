<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker;
use yii\helpers\Url;
use app\models\Situacao;
use app\models\AreaAtuacao;
use app\models\Setor;
use app\models\ProgramaProger;
use app\models\Gestor;
/* @var $this yii\web\View */
/* @var $model app\models\ProjetoProger */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stepwizard">
    <div class="stepwizard-row">
        <div class="stepwizard-step">            
             <?= Html::a('1', ['/projeto-proger/cadastrar','s'=>'1','idmodel'=>$model->id], ['class'=>'btn btn-default btn-circle']) ?>
            <p>Informações Gerais</p>
        </div>
        <div class="stepwizard-step">
            <?= Html::a('2', ['/projeto-proger/cadastrar','s'=>'2','idmodel'=>$model->id], ['class'=>'btn btn-default btn-circle']) ?>
            <p>Integrantes</p>
        </div>
        <div class="stepwizard-step">
            <?= Html::a('3', ['/projeto-proger/cadastrar','s'=>'3','idmodel'=>$model->id], ['class'=>'btn btn-default btn-circle']) ?>
            <p>Resoluções</p>
        </div>
        <div class="stepwizard-step">
            <?= Html::a('3', ['/projeto-proger/cadastrar','s'=>'4','idmodel'=>$model->id], ['class'=>'btn btn-primary btn-circle']) ?>
            <p>Financiadoras</p>
        </div>
    </div>
</div>




<div class="well">
    <?php $form = ActiveForm::begin(); ?>


    <?php ActiveForm::end(); ?>
 


    <div class="form-group">           
         <a href="?r=projeto-proger/cadastrar&s=3&idmodel=<?php echo $model->id?>"><button class="btn btn-warning">Voltar(Etapa 2)</button></a>        
    </div>

    


</div>
<div>
    <?= Html::a('Ver Projetos', ['/projeto-proger/index'],['class'=>'btn btn-info  btn']) ?>
</div>

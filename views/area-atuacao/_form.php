<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use app\models\NivelAtuacao;

/* @var $this yii\web\View */
/* @var $model app\models\AreaAtuacao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="area-atuacao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' =>100,'style' =>'width: 50%' ]) ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' =>15,'style' =>'width: 30%' ]) ?>

    <?= $form->field($model, 'idNivelAtuacao')->dropDownList(ArrayHelper::map(NivelAtuacao::find()->orderBy('nome')->all(),'id', 'nome'),['prompt'=>'Selecione um Nível de Atuação', 'style' =>'width: 50%'])  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

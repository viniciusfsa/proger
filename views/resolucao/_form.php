<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Resolucao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resolucao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'numero')->textInput(['maxlength' =>20,'style' =>'width: 50%' ]) ?>

    <?= $form->field($model, 'assunto')->textArea(['maxlength' =>500,'style' =>'width: 50%' ]) ?>

    <?= $form->field($model, 'dataResolucao', ['options' => ['style' =>'width: 20%']])->widget(DatePicker::classname(),
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

    <?= $form->field($model, 'dataPublicacao', ['options' => ['style' =>'width: 20%']])->widget(DatePicker::classname(),
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

    <?= $form->field($model, 'observacao')->textArea(['maxlength' =>500,'style' =>'width: 50%' ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

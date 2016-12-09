<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\GruposUsuario;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Novo Usuário';
$this->params['breadcrumbs'][] = ['label' => 'Configurações', 'url' => ['site/configuracoes']];
$this->params['breadcrumbs'][] = ['label' => 'Usuários', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="well">

	<h1><?= Html::encode($this->title) ?></h1> 

    <hr style="height:1px; border:none; background-color:#D0D0D0; margin-top: 10px; margin-bottom: 15px;" />

    <?php $form = ActiveForm::begin(); ?>

    <div style="conteudo">

		<div class="row">
			<div class="col-md-3">
				<?= $form->field($model, 'nameGrupo')->dropDownList(ArrayHelper::map(GruposUsuario::findAll(), 'name', 'descricao'), ['prompt' => '---- Selecione um Grupo ----'])->label('Grupo: ');  ?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<?= $form->field($model, 'nome')->textInput(['maxlength' => 100])->label('Nome: ') ?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				<?= $form->field($model, 'login')->textInput(['maxlength' => 15])->label('Login: ')->hint('Máximo: 15 caracteres') ?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				<?= $form->field($model, 'situacao')->dropDownList([1 => 'Ativo', 0 => 'Inativo'])->label('Situação: ');  ?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-3">
				<?= $form->field($model, 'senha')->passwordInput(['maxlength' => 10])->label('Senha: ')->hint('Máximo: 10 caracteres') ?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-3">
				<?= $form->field($model, 'repeat_password')->passwordInput(['maxlength' => 10])->label('Confirmação de senha: ') ?>
			</div>
		</div>

		<div class="panel panel-default">
        <div class="panel-heading"><b>Permissões</b></div>
        <div class="panel-body">
          
          <?php
              $setores = ArrayHelper::map($setores, 'id', 'nome');
          ?>
          <div class="checkbox">
            <?= $form->field($model, 'permissoes')->checkBoxList($setores, ['template'=>'{input} <p>{label}</p>', 'separator'=>'</br>'])->label(false); ?>
          </div>

        </div>
      </div>


		
			
	</div>

	<div class="form-group" align="right" style="margin: 20px">
		<?= Html::submitButton('Cadastrar', ['class' => 'btn btn-success']) ?>
	</div>

    <?php ActiveForm::end(); ?>

</div>

<?php
//conteudo referencia: http://jquery-manual.blogspot.com.br/2015/02/yii-framework-2-user-recuperar-password.html

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
 
<h3><?= $msg ?></h3>
 
<h1>Redefinir Senha</h1>
<?php $form = ActiveForm::begin([
    'method' => 'post',
    'enableClientValidation' => true,
]);
?>

<div class="form-group">
 <?= $form->field($model, "email")->input("email") ?>  
</div>
 
<div class="form-group">
 <?= $form->field($model, "password")->passwordInput(['maxlength' => 10])->label('Senha: ')->hint('Máximo: 10 caracteres')?>  
</div>
 
<div class="form-group">
 <?= $form->field($model, "password_repeat")->passwordInput(['maxlength' => 10])->label('Senha: ')->hint('Máximo: 10 caracteres') ?>  
</div>

<div class="form-group">
 <?= $form->field($model, "verification_code")->input("text") ?>  
</div>

<div class="form-group">
 <?= $form->field($model, "recover")->input("hidden")->label(false) ?>  
</div>
 
<?= Html::submitButton("Redefinir Senha", ["class" => "btn btn-primary"]) ?>
 
<?php $form->end() ?>
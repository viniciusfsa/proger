<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProjetoProger */

$this->title = 'Novo Projeto';
$this->params['breadcrumbs'][] = ['label' => 'Projetos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projeto-proger-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

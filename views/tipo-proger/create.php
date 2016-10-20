<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipoProger */

$this->title = 'Novo Tipo Proger';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Proger', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-proger-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

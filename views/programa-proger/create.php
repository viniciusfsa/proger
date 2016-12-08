<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProgramaProger */

$this->title = 'Novo Programa Proger';
$this->params['breadcrumbs'][] = ['label' => 'Programa Proger', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programa-proger-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Financiamento */

$this->title = 'Create Financiamento';
$this->params['breadcrumbs'][] = ['label' => 'Financiamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="financiamento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

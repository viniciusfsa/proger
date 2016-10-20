<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Edital */

$this->title = 'Novo Edital';
$this->params['breadcrumbs'][] = ['label' => 'Edital', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edital-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

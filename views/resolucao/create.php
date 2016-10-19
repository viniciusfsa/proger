<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Resolucao */

$this->title = 'Nova Resolução';
$this->params['breadcrumbs'][] = ['label' => 'Resoluções', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resolucao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

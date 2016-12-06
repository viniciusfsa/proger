<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CursoProger */

$this->title = 'Novo Curso Proger';
$this->params['breadcrumbs'][] = ['label' => 'Curso Proger', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="curso-proger-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

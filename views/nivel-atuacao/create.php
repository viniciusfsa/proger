<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NivelAtuacao */

$this->title = 'Novo Nível de Atuação';
$this->params['breadcrumbs'][] = ['label' => 'Nivel Atuacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nivel-atuacao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

xz<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Resolucao */

$this->title = $model->numero;
$this->params['breadcrumbs'][] = ['label' => 'Resoluções', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resolucao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Você tem certeza que deseja excluir este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'numero',
            'assunto',
            'dataResolucao',
            'dataPublicacao',
            'observacao',
        ],
    ]) ?>

</div>

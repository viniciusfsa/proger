<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\NivelAtuacao;

/* @var $this yii\web\View */
/* @var $model app\models\AreaAtuacao */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Área de Atuação', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-atuacao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja excluir este registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nome',
            'codigo',
            
            [
                'attribute' => 'idNivelAtuacao',
                'label' => 'Nível de Atuação',
                'value' => NivelAtuacao::findOne($model->idNivelAtuacao)->nome,
            ], 
        ],
    ]) ?>

</div>

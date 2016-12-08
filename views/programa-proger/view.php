<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProgramaProger */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Programa Proger', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programa-proger-view">

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
            'descricao',
            'idSituacao',
            'idAreaAtuacao',
            'idSetor',
            'interdepartamental',
            'interinstitucional',
            'dataInicio',
            'dataFim',
            'observacoes',
            'idGestor',
        ],
    ]) ?>

</div>

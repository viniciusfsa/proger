<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CursoProger */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Curso Proger', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="curso-proger-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'nome',
            'descricao',
            'idSituacao',
            'idAreaAtuacao',
            'idSetor',
            'interdepartamental',
            'interinstitucional',
            'cargaHoraria',
            'dataInicio',
            'dataFim',
            'observacoes',
            'idTipoProger',
            'idProger',
            'idGestor',
        ],
    ]) ?>

</div>

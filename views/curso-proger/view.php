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
            //'idSetor',
            [
                'attribute' => 'idSetor',
                //'value' => $model->getIdGestor0(),
                'label' => 'Setor',
            ],
            
            //'interdepartamental',
            [
                'attribute' => 'interdepartamental',
                'value' => $model->getInterdepartamental(),
                'label' => 'Interdepartamental',
            ], 
            //'interinstitucional',
            [
                'attribute' => 'interinstitucional',
                'value' => $model->getInterinstitucional(),
                'label' => 'Interdepartamental',
            ], 
            'cargaHoraria',
            //'dataInicio',
            [
                'attribute' => 'dataInicio',
                'label' => 'Data Inicio',
                'value' => date_format(date_create($model->dataInicio), 'd/m/Y'),
            ],
            //'dataFim',
            [
                'attribute' => 'dataFim',
                'label' => 'Data Fim',
                'value' => date_format(date_create($model->dataFim), 'd/m/Y'),
            ],
            'observacoes',
            'idTipoProger',
            'idProger',
            'idGestor',
        ],
    ]) ?>

</div>

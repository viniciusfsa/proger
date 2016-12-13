<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Setor;
use app\models\Situacao;
use app\models\AreaAtuacao;
use app\models\TipoProger;
use app\models\Gestor;

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
                'confirm' => 'Confirma a exclusão deste item?',
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
            //'idSituacao',
            [
                'attribute' => 'idSituacao',
                'label' => 'Situação',
                'value' => Situacao::findOne($model->idSituacao)->nome,
            ], 
            //'idAreaAtuacao',
            [
                'attribute' => 'idAreaAtuacao',
                'label' => 'Área Atuação',
                'value' => AreaAtuacao::findOne($model->idAreaAtuacao)->nome,
            ], 
            //'idSetor',
            [
                'attribute' => 'idSetor',
                'label' => 'Setor',
                'value' => Setor::findOne($model->idSetor)->nome,
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
            //'idTipoProger',
            [
                'attribute' => 'idTipoProger',
                'label' => 'Tipo Proger',
                //'value' => TipoProger::findOne($model->idTipoProger)->nome,
            ], 
            //'idProger',
            /*[
                'attribute' => 'idProger',
                'label' => 'Situação',
                'value' => Situacao::findOne($model->idProger)->nome,
            ],*/
            //'idGestor',
            [
                'attribute' => 'idGestor',
                'label' => 'Gestor',
                'value' => Gestor::findOne($model->idGestor)->nome,
            ],
        ],
    ]) ?>

</div>

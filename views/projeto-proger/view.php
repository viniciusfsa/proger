<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Situacao;
use app\models\AreaAtuacao;
use app\models\Setor;
use app\models\Programa;
/* @var $this yii\web\View */
/* @var $model app\models\ProjetoProger */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Projets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projeto-proger-view">

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
            'nome',
            'descricao',
            //'idSituacao',
            [
                'attribute' => 'idSituacao',
                'value' => Situacao::findOne($model->idSituacao)->nome,
            ],
            //'idAreaAtuacao',
            [
                'attribute' => 'idAreaAtuacao',
                'value' => AreaAtuacao::findOne($model->idAreaAtuacao)->nome,
            ],
            //'idSetor',
            [
                'attribute' => 'idSetor',
                'value' => Setor::findOne($model->idSetor)->nome,
            ],
            //'idPrograma',
            [
                'attribute' => 'idPrograma',
                'value' => Programa::findOne($model->idPrograma)->nome,
            ],
            'interdepartamental',
            'interinstitucional',
            //'dataInicio',
            [
                'attribute' => 'dataInicio',
                'value' => date_format(date_create($model->dataResolucao), 'd/m/Y'),
            ],
            //'dataFim',
            [
                'attribute' => 'dataFim',
                'value' => date_format(date_create($model->dataResolucao), 'd/m/Y'),
            ],
            'observacoes',
            'idGestor',
        ],
    ]) ?>

</div>

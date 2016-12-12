<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Setor;
use app\models\AreaAtuacao;
use app\models\Situacao;
use app\models\Gestor;
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
            //'idSituacao',
            [
                'attribute' => 'idSituacao',
                'label' => 'Situação',
                'value' => Situacao::findOne($model->idSituacao)->nome,
            ], 


            //'idAreaAtuacao',
            [
                'attribute' => 'idAreaAtuacao',
                'label' => 'Área de Atuação',
                'value' => AreaAtuacao::findOne($model->idAreaAtuacao)->nome,
            ], 


          //  'idSetor',

            [
                'attribute' => 'idSetor',
                'label' => 'Setor',
                'value' => Setor::findOne($model->idSetor)->nome,
            ], 

        //    'interdepartamental',
             [
                'attribute' => 'interdepartamental',
                'value' => $model->getDepartamental(),
                'label' => 'Interdepartamental',
            ],


         //   'interinstitucional',
            [
                'attribute' => 'interinstitucional',
                'value' => $model->getInstitucional(),
                'label' => 'Interinstitucional',
            ],



            //'dataInicio',
            [
                'attribute' => 'dataInicio',
                'label' => 'Data Início',
                'value' => date_format(date_create($model->dataInicio), 'd/m/Y'),
            ],
        //    'dataFim',
            [
                'attribute' => 'dataFim',
                'label' => 'Data Fim',
                'value' => date_format(date_create($model->dataFim), 'd/m/Y'),
            ],
            'observacoes',
           // 'idGestor',

            [
                'attribute' => 'idGestor',
                'label' => 'Setor Gestor',
                'value' => Gestor::findOne($model->idGestor)->nome,
            ], 

        ],
    ]) ?>

</div>

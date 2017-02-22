<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Setor;
use app\models\Situacao;
use app\models\AreaAtuacao;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ProjetoProgerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projetos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projeto-proger-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Novo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' =>'id', 
                'headerOptions' => ['style'=>'text-align:center; width: 60px']
            ],
            //'nome',
            [
                'attribute' =>'nome', 
                'headerOptions' => ['style'=>'text-align:center;']
            ],
            //'descricao',
            //'idSituacao',
            [
                'attribute' => 'idSituacao',
                'filter' => Situacao::dropdown(),
                'value' => function($model, $index, $dataColumn) {
                    $dropdown = Situacao::dropdown();
                    return $dropdown[$model->idSituacao];
                },
                'headerOptions' => ['style'=>'text-align:center; width: 130px']
            ],
            //'idAreaAtuacao',
            [
                'attribute' => 'idAreaAtuacao',
                'filter' => AreaAtuacao::dropdown(),
                'value' => function($model, $index, $dataColumn) {
                    $dropdown = AreaAtuacao::dropdown();
                    return $dropdown[$model->idAreaAtuacao];
                },
                'headerOptions' => ['style'=>'text-align:center; width: 160px']
            ],
            //'idSetor',
            [
                'attribute' => 'idSetor',
                'filter' => Setor::dropdown(),
                'value' => function($model, $index, $dataColumn) {
                    $dropdown = Setor::dropdown();
                    return $dropdown[$model->idSetor];
                },
                'headerOptions' => ['style'=>'text-align:center; width: 180px']
            ],
            // 'idPrograma',
            //'interdepartamental',
            [            
                'attribute' => 'interdepartamental',
                'format' => 'raw',
                'filter' => [1 => 'Sim', 0 => 'Não'],
                'value' => function($model, $index, $dataColumn) {
                    switch($model->interdepartamental){
                        case 1: return  '<p class="label label-success">Sim</p>';
                        case 0: return '<p class="label label-danger">Não</p>';
                    }
                },
                'headerOptions' => ['style'=>'text-align:center; width: 120px;'],
                'contentOptions'=>['align' => 'center']
            ],
            //'interinstitucional',
            [
                'attribute' => 'interinstitucional',
                'format' => 'raw',
                'filter' => [1 => 'Sim', 0 => 'Não'],
                'value' => function($model, $index, $dataColumn) {
                    switch($model->interinstitucional){
                        case 1: return  '<p class="label label-success">Sim</p>';
                        case 0: return '<p class="label label-danger">Não</p>';
                    }
                },
                'headerOptions' => ['style'=>'text-align:center; width: 120px;'],
                'contentOptions'=>['align' => 'center']
            ],
            // 'dataInicio',
            // 'dataFim',
            // 'observacoes',
            // 'idGestor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Gestor;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CursoProgerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Curso Proger';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="curso-proger-index">

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
            'nome',
            'descricao',
            'idSituacao',
            'idAreaAtuacao',
            // 'idSetor',
            // 'interdepartamental',
            [
                'attribute' => 'ativo',
                'format' => 'raw',
                'label' => 'Interdepartamental',
                'filter' => [1 => 'Ativo', 0 => 'Inativo'],
                'value' => function($model, $index, $dataColumn) {
                    switch($model->interdepartamental){
                        case 1: return  '<p class="label label-success">Ativo</p>';
                        case 0: return '<p class="label label-danger">Inativo</p>';
                    }
                },
                'headerOptions' => ['style'=>'text-align:center; width: 120px;'],
                'contentOptions'=>['align' => 'center']
            ],
            // 'interinstitucional',
            [
                'attribute' => 'ativo',
                'format' => 'raw',
                'label' => 'Interinstitucional',
                'filter' => [1 => 'Ativo', 0 => 'Inativo'],
                'value' => function($model, $index, $dataColumn) {
                    switch($model->interinstitucional){
                        case 1: return  '<p class="label label-success">Ativo</p>';
                        case 0: return '<p class="label label-danger">Inativo</p>';
                    }
                },
                'headerOptions' => ['style'=>'text-align:center; width: 120px;'],
                'contentOptions'=>['align' => 'center']
            ],
            // 'cargaHoraria',
            'dataInicio',
           /* [
                'attribute' => 'dataInicio',
                'label' => 'Data Inicio',
                'value' => date_format(date_create($model, 'dataInicio', $index, $dataColumn), 'd/m/Y H:i:s'),
            ],*/
             'dataFim',
            // 'observacoes',
            // 'idTipoProger',
            // 'idProger',
             'idGestor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

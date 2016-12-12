<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Gestor;
use kartik\widgets\DatePicker;

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
            //'nome',
            [
                'attribute' => 'nome',
                //'label' => 'Situação',
                'headerOptions' => ['style'=>'text-align:center; width: 550px;'],
                //'contentOptions'=>['align' => 'center']
            ],
            'descricao',
            'idSituacao',
            'idAreaAtuacao',
            // 'idSetor',
            // 'interdepartamental',
            [
                'attribute' => 'interdepartamental',
                'format' => 'raw',
                'label' => 'Interdepartamental',
                'filter' => [1 => 'Sim', 0 => 'Não'],
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
                'attribute' => 'interinstitucional',
                'format' => 'raw',
                'label' => 'Interinstitucional',
                'filter' => [1 => 'Sim', 0 => 'Não'],
                'value' => function($model, $index, $dataColumn) {
                    switch($model->interinstitucional){
                        case 1: return  '<p class="label label-success">Ativo</p>';
                        case 0: return '<p class="label label-danger">Inativo</p>';
                    }
                },
                'headerOptions' => ['style'=>'text-align:center; width: 120px;'],
                'contentOptions'=>['align' => 'center']
            ],

             'cargaHoraria',
            //'dataInicio',
           /* [
                'attribute' => 'dataInicio',
                'headerOptions' => ['style'=>'text-align:center; width: 150px;'],
                'filter' => DatePicker::widget([
                        'name' => 'Data Inicio',
                        'options' => ['placeholder' => ''],

                        'pluginOptions' => [
                            'autoclose'=>false,
                            'format' => 'dd/mm/yyyy',
                            'todayHighlight' => true,
                        ]
                    ]),
                'value' => function($model, $index, $dataColumn) {
                    return date_format(date_create($model->dataInicio), 'd/m/Y');
                },
            ],
            //'dataFim',
            [
                'attribute' => 'dataFim',
                'headerOptions' => ['style'=>'text-align:center; width: 150px;'],
                'filter' => DatePicker::widget([
                        'name' => 'Data Fim',
                        'options' => ['placeholder' => ''],

                        'pluginOptions' => [
                            'autoclose'=>false,
                            'format' => 'dd/mm/yyyy',
                            'todayHighlight' => true,
                        ]
                    ]),
                'value' => function($model, $index, $dataColumn) {
                    return date_format(date_create($model->dataFim), 'd/m/Y');
                },
            ],*/
            // 'observacoes',
            // 'idTipoProger',
            // 'idProger',
            // 'idGestor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Gestor;
use kartik\widgets\DatePicker;
use app\models\Setor;
use app\models\Situacao;
use app\models\AreaAtuacao;
use app\models\TipoProger;


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
            //'idSituacao',
            [
                'attribute' => 'idSituacao',
                'filter' => Situacao::dropdown(),
                'value' => function($model, $index, $dataColumn) {
                    $dropdown = Situacao::dropdown();
                    return $dropdown[$model->idSituacao];
                },
                'headerOptions' => ['style'=>'text-align:center;']
            ],
            //'idAreaAtuacao',
            [
                'attribute' => 'idAreaAtuacao',
                'filter' => AreaAtuacao::dropdown(),
                'value' => function($model, $index, $dataColumn) {
                    $dropdown = AreaAtuacao::dropdown();
                    return $dropdown[$model->idAreaAtuacao];
                },
                'headerOptions' => ['style'=>'text-align:center;']
            ],
            // 'idSetor',
            // 'interdepartamental',
            /*[
                'attribute' => 'interdepartamental',
                'format' => 'raw',
                'label' => 'Interdepartamental',
                'filter' => [1 => 'Sim', 0 => 'Não'],
                'value' => function($model, $index, $dataColumn) {
                    switch($model->interdepartamental){
                        case 1: return  '<p class="label label-success">Sim</p>';
                        case 0: return '<p class="label label-danger">Não</p>';
                    }
                },
                'headerOptions' => ['style'=>'text-align:center; width: 120px;'],
                'contentOptions'=>['align' => 'center']
            ],*/
            // 'interinstitucional',
            /*[
                'attribute' => 'interinstitucional',
                'format' => 'raw',
                'label' => 'Interinstitucional',
                'filter' => [1 => 'Sim', 0 => 'Não'],
                'value' => function($model, $index, $dataColumn) {
                    switch($model->interinstitucional){
                        case 1: return  '<p class="label label-success">Sim</p>';
                        case 0: return '<p class="label label-danger">Não</p>';
                    }
                },
                'headerOptions' => ['style'=>'text-align:center; width: 120px;'],
                'contentOptions'=>['align' => 'center']
            ],*/

             'cargaHoraria',
            //'dataInicio',
            //'dataFim',
            // 'observacoes',
            // 'idTipoProger',
            /*[
                'attribute' => 'idTipoProger',
                'filter' => TipoProger::dropdown(),
                'value' => function($model, $index, $dataColumn) {
                    $dropdown = TipoProger::dropdown();
                    return $dropdown[$model->idTipoProger];
                },
                'headerOptions' => ['style'=>'text-align:center;']
            ],*/
            // 'idProger',
            // 'idGestor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 

?>


</div>

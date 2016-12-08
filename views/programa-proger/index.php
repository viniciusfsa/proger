<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ProgramaProgerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programa Proger';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programa-proger-index">

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
            //'descricao',
            //'idSituacao',
            //'idAreaAtuacao',
            // 'idSetor',
            // 'interdepartamental',
            // 'interinstitucional',
            // 'dataInicio',
            // 'dataFim',
            // 'observacoes',
            // 'idGestor',


            [
                'attribute' => 'nome',
                'label' => 'Nome',
                'headerOptions' => ['style'=>'text-align:center; width: 1000px;'],
                'contentOptions'=>['align' => 'left'],
            ],
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

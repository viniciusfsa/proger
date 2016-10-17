<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\pais;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\InstituicaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Instituição';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instituicao-index">

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

            'id',
            'instituicao',
            //'idPais',

            [
                'attribute' => 'idPais',
                'label' => 'País',
                'filter' => pais::dropdown(),
                'value' => function($model, $index, $dataColumn) {
                    $dropdown = pais::dropdown();
                    return $dropdown[$model->id];
                },
                'headerOptions' => ['style'=>'text-align:center; width: 130px;'],
                'contentOptions'=>['align' => 'center', 'style'=>'width: 130px;'],
            ],

            [
                'attribute' => 'ativo',
                'format' => 'raw',
                'label' => 'Situção',
                'filter' => [1 => 'Ativo', 0 => 'Inativo'],
                'value' => function($model, $index, $dataColumn) {
                    switch($model->ativo){
                        case 1: return  '<p class="label label-success">Ativo</p>';
                        case 0: return '<p class="label label-danger">Inativo</p>';
                    }
                },
                'headerOptions' => ['style'=>'text-align:center; width: 120px;'],
                'contentOptions'=>['align' => 'center']
            ],
            'sigla',




            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

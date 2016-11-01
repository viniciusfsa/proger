<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Estado;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CidadeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cidades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cidade-index">

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
            'nome',
            //'idEstado',
            [
                'attribute' => 'idEstado',
                'label' => 'Estado',
                'filter' => Estado::dropdown(),
                'value' => function($model, $index, $dataColumn) {
                    $dropdown = Estado::dropdown();
                    return $dropdown[$model->idEstado];
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

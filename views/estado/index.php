<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Pais;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EstadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-index">

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
                'attribute' =>'nome', 
                'headerOptions' => ['style'=>'text-align:center;']
            ],
            //'sigla',
            [
                'attribute' => 'sigla',
                'headerOptions' => ['style'=>'text-align:center; width: 120px;'],
            ],
            //'idPais',
            [
                'attribute' => 'idPais',
                'filter' => Pais::dropdown(),
                'value' => function($model, $index, $dataColumn) {
                    $dropdown = Pais::dropdown();
                    return $dropdown[$model->idPais];
                },
                'headerOptions' => ['style'=>'text-align:center;']
            ],
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

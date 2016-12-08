<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\FinanciadoraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Financiadora';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="financiadora-index">

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

           // 'id',
            [
                'attribute' => 'nome',
                //'label' => 'Situação',
                'headerOptions' => ['style'=>'text-align:center; width: 550px;'],
                //'contentOptions'=>['align' => 'center']
            ],
            [
                'attribute' => 'sigla',
                //'label' => 'Situação',
                'headerOptions' => ['style'=>'text-align:center; width: 300;'],
                //'contentOptions'=>['align' => 'center']
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResolucaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Resoluções';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resolucao-index">

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
                'headerOptions' => ['style'=>'text-align:center; width: 70px;']
            ],
            'numero',
            'assunto',
            'dataResolucao',
            'dataPublicacao',
            'observacao',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

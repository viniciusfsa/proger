<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\widgets\DatePicker;

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
                'headerOptions' => ['style'=>'text-align:center; width: 60px;']
            ],
            //'numero',
            [
                'attribute' =>'numero', 
                'headerOptions' => ['style'=>'text-align:center; width: 100px;']
            ],
            //'assunto',
            [
                'attribute' =>'assunto', 
                'headerOptions' => ['style'=>'text-align:center; width: 300px;']
            ],

            //'dataResolucao',
            [
                'attribute' => 'dataResolucao',
                'headerOptions' => ['style'=>'text-align:center; width: 150px;'],
                'filter' => DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'dataResolucao',
                        'options' => ['placeholder' => ''],
                        'type' => DatePicker::TYPE_INPUT,

                        'pluginOptions' => [
                            'autoclose'=>false,
                            'format' => 'dd/mm/yyyy',
                            'todayHighlight' => true,
                            'clearBtn' => true,
                        ]
                    ]),
                'value' => function($model, $index, $dataColumn) {
                    return date_format(date_create($model->dataResolucao), 'd/m/Y');
                },
            ],
            //'dataPublicacao',
            [
                'attribute' => 'dataPublicacao',
                'headerOptions' => ['style'=>'text-align:center; width: 150px;'],
                'filter' => DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'dataPublicacao',
                        'options' => ['placeholder' => ''],
                        'type' => DatePicker::TYPE_INPUT,

                        'pluginOptions' => [
                            'autoclose'=>false,
                            'format' => 'dd/mm/yyyy',
                            'todayHighlight' => true,
                            'clearBtn' => true,
                        ]
                    ]),
                'value' => function($model, $index, $dataColumn) {
                    return date_format(date_create($model->dataPublicacao), 'd/m/Y');
                },
            ],
            //'observacao',
            [
                'attribute' =>'observacao', 
                'headerOptions' => ['style'=>'text-align:center; width: 285px;']
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

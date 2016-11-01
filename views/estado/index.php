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

            'id',
            'nome',
            'sigla',
            //'idPais',
            [
                'attribute' => 'idPais',
                'label' => 'País',
                'filter' => Pais::dropdown(),
                'value' => function($model, $index, $dataColumn) {
                    $dropdown = Pais::dropdown();
                    return $dropdown[$model->idPais];
                },
            ],
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

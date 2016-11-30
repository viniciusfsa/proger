<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\tipoEventoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipo de Eventos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-evento-index">

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

          //  'id',
          //  'nome',
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

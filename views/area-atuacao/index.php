<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\NivelAtuacao;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AreaAtuacaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Áreas de Atuação';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-atuacao-index">

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

            'nome',
            'codigo',
            //'idNivelAtuacao',
            [
                'attribute' => 'idNivelAtuacao',
                'label' => 'Nível de Atuação',
                'filter' => NivelAtuacao::dropdown(),
                'value' => function($model, $index, $dataColumn) {
                    $dropdown = NivelAtuacao::dropdown();
                    return $dropdown[$model->idNivelAtuacao];
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

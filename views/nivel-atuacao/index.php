<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NivelAtuacaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Níveis de Atuação';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nivel-atuacao-index">

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

            ['class' => 'yii\grid\ActionColumn'],
        ],

    ]); ?>
</div>

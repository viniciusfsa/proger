<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\EventoPorger */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Eventos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evento-proger-index">

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
            'descricao',
            'idTipoEvento',
            'idSituacao',
            // 'idAreaAtuacao',
            // 'dataInicio',
            // 'dataFim',
            // 'cargaHoraria',
            // 'numeroParticipantes',
            // 'observacoes',
            // 'idTipoProger',
            // 'idProger',
            // 'idGestor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Integrante */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Integrantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="integrante-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Integrante', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idTipoVinculo',
            'idTipoFuncao',
            'idInstituicao',
            'idSetor',
            // 'idCurso',
            // 'idPessoa',
            // 'dataInicio',
            // 'dataFim',
            // 'ativo',
            // 'matricula',
            // 'cargaHoraria',
            // 'idTipoProger',
            // 'idProger',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

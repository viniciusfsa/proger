<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Gestor;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CursoProgerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Curso Proger';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="curso-proger-index">

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
            'nome',
            'descricao',
            'idSituacao',
            'idAreaAtuacao',
            // 'idSetor',
            // 'interdepartamental',
            // 'interinstitucional',
            // 'cargaHoraria',
            // 'dataInicio',
            // 'dataFim',
            // 'observacoes',
            // 'idTipoProger',
            // 'idProger',
            // 'idGestor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

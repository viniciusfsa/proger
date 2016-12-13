<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProjetoProger */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Projets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projeto-proger-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Você tem certeza que deseja excluir este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nome',
            'descricao',
            'idSituacao',
            'idAreaAtuacao',
            'idSetor',
            'idPrograma',
            'interdepartamental',
            'interrinstituicional',
            'dataInicio',
            'dataFim',
            'observacoes',
            'idGestor',
        ],
    ]) ?>

</div>

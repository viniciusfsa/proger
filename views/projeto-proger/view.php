<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Situacao;
use app\models\AreaAtuacao;
use app\models\Setor;
use app\models\Gestor;
use app\models\ProgramaProger;
/* @var $this yii\web\View */
/* @var $model app\models\ProjetoProger */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Projetos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="projeto-proger-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['cadastrar', 'idmodel' => $model->id,'s'=>1], ['class' => 'btn btn-primary']) ?>
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
            //'idSituacao',
            [
                'attribute' => 'idSituacao',
                'value' => Situacao::findOne($model->idSituacao)->nome,
            ],
            //'idAreaAtuacao',
            [
                'attribute' => 'idAreaAtuacao',
                'value' => AreaAtuacao::findOne($model->idAreaAtuacao)->nome,
            ],
            //'idSetor',
            [
                'attribute' => 'idSetor',
                'value' => Setor::findOne($model->idSetor)->nome,
            ],
            //'idPrograma',
            [
                'attribute' => 'idPrograma',
                'value' => ProgramaProger::findOne($model->idPrograma)->nome,
            ],
            //'interdepartamental',
            [            
                'attribute' => 'interdepartamental',                
                'value' => $model->getInterdepartamental(),                
            ],
            //'interinstitucional',
            [            
                'attribute' => 'interinstitucional',                
                'value' => $model->getInterinstitucional(),                
            ],
            //'dataInicio',
            [
                'attribute' => 'dataInicio',
                'value' => date_format(date_create($model->dataInicio), 'd/m/Y'),
            ],
            //'dataFim',
            [
                'attribute' => 'dataFim',
                'value' => date_format(date_create($model->dataFim), 'd/m/Y'),
            ],
            'observacoes',
            //'idGestor',
            [
                'attribute' => 'idGestor',
                'value' => Gestor::findOne($model->idGestor)->nome,
            ],
        ],
    ]) ?>

</div>

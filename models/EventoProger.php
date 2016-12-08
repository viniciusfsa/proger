<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "eventoProger".
 *
 * @property integer $id
 * @property string $nome
 * @property string $descricao
 * @property integer $idTipoEvento
 * @property integer $idSituacao
 * @property integer $idAreaAtuacao
 * @property string $dataInicio
 * @property string $dataFim
 * @property integer $cargaHoraria
 * @property integer $numeroParticipantes
 * @property string $observacoes
 * @property integer $idTipoProger
 * @property integer $idProger
 * @property integer $idGestor
 *
 * @property AreaAtuacao $idAreaAtuacao0
 * @property Gestor $idGestor0
 * @property Situacao $idSituacao0
 * @property TipoEvento $idTipoEvento0
 * @property TipoProger $idTipoProger0
 */
class EventoProger extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'eventoProger';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'descricao', 'idTipoEvento', 'idSituacao', 'idAreaAtuacao', 'dataInicio', 'dataFim', 'cargaHoraria', 'numeroParticipantes', 'idGestor'], 'required'],
            [['idTipoEvento', 'idSituacao', 'idAreaAtuacao', 'cargaHoraria', 'numeroParticipantes', 'idTipoProger', 'idGestor'], 'integer'],
            [['nome', 'descricao', 'observacoes'], 'string'],
            [['dataInicio', 'dataFim'], 'safe'],
            [['idAreaAtuacao'], 'exist', 'skipOnError' => true, 'targetClass' => AreaAtuacao::className(), 'targetAttribute' => ['idAreaAtuacao' => 'id']],
            [['idGestor'], 'exist', 'skipOnError' => true, 'targetClass' => Gestor::className(), 'targetAttribute' => ['idGestor' => 'id']],
            [['idSituacao'], 'exist', 'skipOnError' => true, 'targetClass' => Situacao::className(), 'targetAttribute' => ['idSituacao' => 'id']],
            [['idTipoEvento'], 'exist', 'skipOnError' => true, 'targetClass' => TipoEvento::className(), 'targetAttribute' => ['idTipoEvento' => 'id']],
            [['idTipoProger'], 'exist', 'skipOnError' => true, 'targetClass' => TipoProger::className(), 'targetAttribute' => ['idTipoProger' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'descricao' => 'Descrição',
            'idTipoEvento' => 'Tipo Evento',
            'idSituacao' => 'Situação',
            'idAreaAtuacao' => 'Área Atuação',
            'dataInicio' => 'Data Início',
            'dataFim' => 'Data Fim',
            'cargaHoraria' => 'Carga Horária',
            'numeroParticipantes' => 'Número Participantes',
            'observacoes' => 'Observações',
            'idTipoProger' => 'Tipo de Vínculo',
            'idProger' => 'Vínculo',
            'idGestor' => 'Gestor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAreaAtuacao0()
    {
        return $this->hasOne(AreaAtuacao::className(), ['id' => 'idAreaAtuacao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGestor0()
    {
        return $this->hasOne(Gestor::className(), ['id' => 'idGestor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSituacao0()
    {
        return $this->hasOne(Situacao::className(), ['id' => 'idSituacao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoEvento0()
    {
        return $this->hasOne(TipoEvento::className(), ['id' => 'idTipoEvento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoProger0()
    {
        return $this->hasOne(TipoProger::className(), ['id' => 'idTipoProger']);
    }



    public function beforeSave($insert)
    {
        $this->dataInicio = date('Ymd H:i:s', strtotime($this->dataInicio));
        $this->dataFim = date('Ymd H:i:s', strtotime($this->dataFim));
        //$this->id = 2;
        //$this->dataInicio = \Yii::$app->formatter->asDate($this->dataInicio, 'php:Y-m-d H:i:s');
        //$this->dataFim = \Yii::$app->formatter->asDate($this->dataFim, 'php:Y-m-d H:i:s');
/*
        $date = DateTime::createFromFormat('d/m/Y', $value);
        $model->posted =  $date->format('Y-m-d');
    */
//        return true;

        //deletar comentarios acima ^
        return parent::beforeSave($insert);
    }
}

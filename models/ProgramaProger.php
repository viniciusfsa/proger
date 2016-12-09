<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "programaProger".
 *
 * @property integer $id
 * @property string $nome
 * @property string $descricao
 * @property integer $idSituacao
 * @property integer $idAreaAtuacao
 * @property integer $idSetor
 * @property integer $interdepartamental
 * @property integer $interinstitucional
 * @property string $dataInicio
 * @property string $dataFim
 * @property string $observacoes
 * @property integer $idGestor
 *
 * @property AreaAtuacao $idAreaAtuacao0
 * @property Gestor $idGestor0
 * @property Setor $idSetor0
 * @property Situacao $idSituacao0
 */
class ProgramaProger extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'programaProger';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'descricao', 'idSituacao', 'idAreaAtuacao', 'idSetor', 'interdepartamental', 'interinstitucional', 'dataInicio', 'idGestor'], 'required'],
            [['nome', 'descricao', 'observacoes'], 'string'],
            [['idSituacao', 'idAreaAtuacao', 'idSetor', 'interdepartamental', 'interinstitucional', 'idGestor'], 'integer'],
            [['dataInicio', 'dataFim'], 'safe'],
            [['idAreaAtuacao'], 'exist', 'skipOnError' => true, 'targetClass' => AreaAtuacao::className(), 'targetAttribute' => ['idAreaAtuacao' => 'id']],
            [['idGestor'], 'exist', 'skipOnError' => true, 'targetClass' => Gestor::className(), 'targetAttribute' => ['idGestor' => 'id']],
            [['idSetor'], 'exist', 'skipOnError' => true, 'targetClass' => Setor::className(), 'targetAttribute' => ['idSetor' => 'id']],
            [['idSituacao'], 'exist', 'skipOnError' => true, 'targetClass' => Situacao::className(), 'targetAttribute' => ['idSituacao' => 'id']],
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
            'descricao' => 'Descricao',
            'idSituacao' => 'Id Situacao',
            'idAreaAtuacao' => 'Id Area Atuacao',
            'idSetor' => 'Id Setor',
            'interdepartamental' => 'Interdepartamental',
            'interinstitucional' => 'Interinstitucional',
            'dataInicio' => 'Data Inicio',
            'dataFim' => 'Data Fim',
            'observacoes' => 'Observacoes',
            'idGestor' => 'Id Gestor',
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
    public function getIdSetor0()
    {
        return $this->hasOne(Setor::className(), ['id' => 'idSetor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSituacao0()
    {
        return $this->hasOne(Situacao::className(), ['id' => 'idSituacao']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "projetoProger".
 *
 * @property integer $id
 * @property string $nome
 * @property string $descricao
 * @property integer $idSituacao
 * @property integer $idAreaAtuacao
 * @property integer $idSetor
 * @property integer $idPrograma
 * @property integer $interdepartamental
 * @property integer $interrinstituicional
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
class ProjetoProger extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projetoProger';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'descricao', 'idSituacao', 'idAreaAtuacao', 'idSetor', 'interdepartamental', 'interrinstituicional', 'dataInicio', 'dataFim', 'idGestor'], 'required'],
            [['nome', 'descricao', 'observacoes'], 'string'],
            [['idSituacao', 'idAreaAtuacao', 'idSetor', 'idPrograma', 'interdepartamental', 'interrinstituicional', 'idGestor'], 'integer'],
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
            'descricao' => 'Descrição',
            'idSituacao' => 'Situação',
            'idAreaAtuacao' => 'Área Atuação',
            'idSetor' => 'Setor',
            'idPrograma' => 'Programa',
            'interdepartamental' => 'Interdepartamental',
            'interrinstituicional' => 'Interrinstituicional',
            'dataInicio' => 'Data de Início',
            'dataFim' => 'Data do Fim',
            'observacoes' => 'Observações',
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

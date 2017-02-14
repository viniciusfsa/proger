<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "integrante".
 *
 * @property integer $id
 * @property integer $idTipoVinculo
 * @property integer $idTipoFuncao
 * @property integer $idInstituicao
 * @property integer $idSetor
 * @property integer $idCurso
 * @property integer $idPessoa
 * @property string $dataInicio
 * @property string $dataFim
 * @property integer $ativo
 * @property string $matricula
 * @property integer $cargaHoraria
 * @property integer $idTipoProger
 * @property integer $idProger
 *
 * @property Curso $idCurso0
 * @property Instituicao $idInstituicao0
 * @property Pessoa $idPessoa0
 * @property Setor $idSetor0
 * @property TipoFuncao $idTipoFuncao0
 * @property TipoProger $idTipoProger0
 * @property TipoVinculo $idTipoVinculo0
 */
class Integrante extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'integrante';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idTipoVinculo', 'idTipoFuncao', 'idInstituicao', 'idSetor', 'idPessoa', 'dataInicio', 'dataFim', 'ativo', 'matricula', 'cargaHoraria', 'idTipoProger', 'idProger'], 'required'],
            [['idTipoVinculo', 'idTipoFuncao', 'idInstituicao', 'idSetor', 'idCurso', 'idPessoa', 'ativo', 'cargaHoraria', 'idTipoProger', 'idProger'], 'integer'],
            [['dataInicio', 'dataFim'], 'safe'],
            [['matricula'], 'string'],
            [['idCurso'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['idCurso' => 'id']],
            [['idInstituicao'], 'exist', 'skipOnError' => true, 'targetClass' => Instituicao::className(), 'targetAttribute' => ['idInstituicao' => 'id']],
            [['idPessoa'], 'exist', 'skipOnError' => true, 'targetClass' => Pessoa::className(), 'targetAttribute' => ['idPessoa' => 'id']],
            [['idSetor'], 'exist', 'skipOnError' => true, 'targetClass' => Setor::className(), 'targetAttribute' => ['idSetor' => 'id']],
            [['idTipoFuncao'], 'exist', 'skipOnError' => true, 'targetClass' => TipoFuncao::className(), 'targetAttribute' => ['idTipoFuncao' => 'id']],
            [['idTipoProger'], 'exist', 'skipOnError' => true, 'targetClass' => TipoProger::className(), 'targetAttribute' => ['idTipoProger' => 'id']],
            [['idTipoVinculo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoVinculo::className(), 'targetAttribute' => ['idTipoVinculo' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idTipoVinculo' => 'Id Tipo Vinculo',
            'idTipoFuncao' => 'Id Tipo Funcao',
            'idInstituicao' => 'Id Instituicao',
            'idSetor' => 'Id Setor',
            'idCurso' => 'Id Curso',
            'idPessoa' => 'Id Pessoa',
            'dataInicio' => 'Data Inicio',
            'dataFim' => 'Data Fim',
            'ativo' => 'Ativo',
            'matricula' => 'Matricula',
            'cargaHoraria' => 'Carga Horaria',
            'idTipoProger' => 'Id Tipo Proger',
            'idProger' => 'Id Proger',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCurso0()
    {
        return $this->hasOne(Curso::className(), ['id' => 'idCurso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdInstituicao0()
    {
        return $this->hasOne(Instituicao::className(), ['id' => 'idInstituicao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPessoa0()
    {
        return $this->hasOne(Pessoa::className(), ['id' => 'idPessoa']);
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
    public function getIdTipoFuncao0()
    {
        return $this->hasOne(TipoFuncao::className(), ['id' => 'idTipoFuncao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoProger0()
    {
        return $this->hasOne(TipoProger::className(), ['id' => 'idTipoProger']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoVinculo0()
    {
        return $this->hasOne(TipoVinculo::className(), ['id' => 'idTipoVinculo']);
    }
}

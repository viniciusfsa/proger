<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "areaAtuacao".
 *
 * @property integer $id
 * @property string $nome
 * @property string $codigo
 * @property integer $idNivelAtuacao
 *
 * @property NivelAtuacao $idNivelAtuacao0
 * @property CursoProger[] $cursoProgers
 * @property EventoProger[] $eventoProgers
 * @property ProgramaProger[] $programaProgers
 * @property ProjetoProger[] $projetoProgers
 */
class AreaAtuacao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'areaAtuacao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'codigo', 'idNivelAtuacao'], 'required'],
            [['nome', 'codigo'], 'string'],
            [['idNivelAtuacao'], 'integer'],
            [['idNivelAtuacao'], 'exist', 'skipOnError' => true, 'targetClass' => NivelAtuacao::className(), 'targetAttribute' => ['idNivelAtuacao' => 'id']],
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
            'codigo' => 'Código',
            'idNivelAtuacao' => 'Nível de Atuação',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNivelAtuacao0()
    {
        return $this->hasOne(NivelAtuacao::className(), ['id' => 'idNivelAtuacao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursoProgers()
    {
        return $this->hasMany(CursoProger::className(), ['idAreaAtuacao' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventoProgers()
    {
        return $this->hasMany(EventoProger::className(), ['idAreaAtuacao' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaProgers()
    {
        return $this->hasMany(ProgramaProger::className(), ['idAreaAtuacao' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjetoProgers()
    {
        return $this->hasMany(ProjetoProger::className(), ['idAreaAtuacao' => 'id']);
    }
}

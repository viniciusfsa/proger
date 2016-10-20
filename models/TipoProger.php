<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipoProger".
 *
 * @property integer $id
 * @property string $nome
 *
 * @property CursoProger[] $cursoProgers
 * @property Edicao[] $edicaos
 * @property EventoProger[] $eventoProgers
 * @property Financiamento[] $financiamentos
 * @property Integrante[] $integrantes
 * @property MunicipiosAbrangidos[] $municipiosAbrangidos
 * @property ResolucaoProger[] $resolucaoProgers
 */
class TipoProger extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipoProger';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Proger',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursoProgers()
    {
        return $this->hasMany(CursoProger::className(), ['idTipoProger' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEdicaos()
    {
        return $this->hasMany(Edicao::className(), ['idTipoProger' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventoProgers()
    {
        return $this->hasMany(EventoProger::className(), ['idTipoProger' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFinanciamentos()
    {
        return $this->hasMany(Financiamento::className(), ['idTipoPorger' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIntegrantes()
    {
        return $this->hasMany(Integrante::className(), ['idTipoProger' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipiosAbrangidos()
    {
        return $this->hasMany(MunicipiosAbrangidos::className(), ['idTipoProger' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResolucaoProgers()
    {
        return $this->hasMany(ResolucaoProger::className(), ['idTipoProger' => 'id']);
    }
}

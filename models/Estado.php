<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado".
 *
 * @property integer $id
 * @property string $nome
 * @property string $sigla
 * @property integer $idPais
 *
 * @property Cidade[] $cidades
 * @property Pais $idPais0
 * @property Pessoa[] $pessoas
 */
class Estado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'sigla', 'idPais'], 'required'],
            [['nome', 'sigla'], 'string'],
            [['idPais'], 'integer'],
            [['idPais'], 'exist', 'skipOnError' => true, 'targetClass' => Pais::className(), 'targetAttribute' => ['idPais' => 'id']],
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
            'sigla' => 'Sigla',
            'idPais' => 'País',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCidades()
    {
        return $this->hasMany(Cidade::className(), ['idEstado' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPais0()
    {
        return $this->hasOne(Pais::className(), ['id' => 'idPais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPessoas()
    {
        return $this->hasMany(Pessoa::className(), ['idEstado' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "instituicao".
 *
 * @property integer $id
 * @property string $instituicao
 * @property string $pais
 * @property integer $ativo
 *
 * @property Integrante[] $integrantes
 */
class Instituicao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'instituicao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['instituicao', 'pais', 'ativo'], 'required'],
            [['instituicao', 'pais'], 'string'],
            [['ativo'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'instituicao' => 'Instituição',
            'pais' => 'Pais',
            'ativo' => 'Ativo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIntegrantes()
    {
        return $this->hasMany(Integrante::className(), ['idInstituicao' => 'id']);
    }
}

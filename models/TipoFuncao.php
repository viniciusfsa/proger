<?php

namespace app\models;

use Yii; 

/**
 * This is the model class for table "tipoFuncao".
 *
 * @property integer $id
 * @property string $descricao
 * @property integer $ativo
 *
 * @property Integrante[] $integrantes
 */
class TipoFuncao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipoFuncao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descricao', 'ativo'], 'required'],
            [['descricao'], 'string'],
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
            'descricao' => 'Descrição',
            'ativo' => 'Ativo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIntegrantes()
    {
        return $this->hasMany(Integrante::className(), ['idTipoFuncao' => 'id']);
    }

    public function getSituacao(){

        switch ($this->ativo) {
            case 1:
                return 'Ativo';
                break;

            case 0:
                return 'Inativo';
                break;
        }
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nivelAtuacao".
 *
 * @property integer $id
 * @property string $nome
 *
 * @property AreaAtuacao[] $areaAtuacaos
 */
class NivelAtuacao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nivelAtuacao';
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
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreasAtuacao()
    {
        return $this->hasMany(AreaAtuacao::className(), ['idNivelAtuacao' => 'id']);
    }

    public static function dropdown() { 
 
       $models = static::find()->orderBy('nome')->all(); 
       $dropdown = null; 
 
       foreach ($models as $model) { 
           $dropdown[$model->id] = $model->nome; 
       } 
 
       return $dropdown; 
   }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resolucao".
 *
 * @property integer $id
 * @property string $numero
 * @property string $assunto
 * @property string $dataResolucao
 * @property string $dataPublicacao
 * @property string $observacao
 *
 * @property ResolucaoProger[] $resolucaoProgers
 */
class Resolucao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resolucao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numero', 'assunto', 'dataResolucao', 'dataPublicacao', 'observacao'], 'required'],
            [['numero', 'assunto', 'observacao'], 'string'],
            [['dataResolucao', 'dataPublicacao'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'numero' => 'Número',
            'assunto' => 'Assunto',
            'dataResolucao' => 'Data Resolução',
            'dataPublicacao' => 'Data Publicação',
            'observacao' => 'Observação',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResolucaoProgers()
    {
        return $this->hasMany(ResolucaoProger::className(), ['idResolucao' => 'id']);
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

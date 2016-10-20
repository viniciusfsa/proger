<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "edital".
 *
 * @property integer $id
 * @property string $nome
 * @property integer $ano
 * @property string $numero
 *
 * @property Financiamento[] $financiamentos
 */
class Edital extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edital';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'ano', 'numero'], 'required'],
            [['nome', 'numero'], 'string'],
            [['ano'], 'integer'],
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
            'ano' => 'Ano',
            'numero' => 'Número',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFinanciamentos()
    {
        return $this->hasMany(Financiamento::className(), ['idEdital' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "financiadora".
 *
 * @property integer $id
 * @property string $nome
 * @property string $sigla
 *
 * @property Financiamento[] $financiamentos
 */
class Financiadora extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'financiadora';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'sigla'], 'required'],
            [['nome', 'sigla'], 'string'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFinanciamentos()
    {
        return $this->hasMany(Financiamento::className(), ['idFinanciadora' => 'id']);
    }
}

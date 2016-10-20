<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "programa".
 *
 * @property integer $id
 * @property string $nome
 * @property string $descricao
 * @property integer $id_financiamento
 *
 * @property Financiamento $idFinanciamento
 */
class Programa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'programa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'descricao', 'id_financiamento'], 'required'],
            [['nome', 'descricao'], 'string'],
            [['id_financiamento'], 'integer'],
            [['id_financiamento'], 'exist', 'skipOnError' => true, 'targetClass' => Financiamento::className(), 'targetAttribute' => ['id_financiamento' => 'id']],
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
            'descricao' => 'Descricao',
            'id_financiamento' => 'Id Financiamento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFinanciamento()
    {
        return $this->hasOne(Financiamento::className(), ['id' => 'id_financiamento']);
    }
}

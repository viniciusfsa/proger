<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipoEvento".
 *
 * @property integer $id
 * @property string $nome
 *
 * @property EventoProger[] $eventoProgers
 */
class TipoEvento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipoEvento';
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
    public function getEventoProgers()
    {
        return $this->hasMany(EventoProger::className(), ['idTipoEvento' => 'id']);
    }
}

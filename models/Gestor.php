<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gestor".
 *
 * @property integer $id
 * @property string $nome
 *
 * @property CursoProger[] $cursoProgers
 * @property EventoProger[] $eventoProgers
 * @property Programa[] $programas
 * @property ProjetoProger[] $projetoProgers
 */
class Gestor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gestor';
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
            'nome' => 'Gestor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursoProgers()
    {
        return $this->hasMany(CursoProger::className(), ['idGestor' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventoProgers()
    {
        return $this->hasMany(EventoProger::className(), ['idGestor' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramas()
    {
        return $this->hasMany(Programa::className(), ['idGestor' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjetoProgers()
    {
        return $this->hasMany(ProjetoProger::className(), ['idGetsor' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pessoa".
 *
 * @property integer $id
 * @property string $nome
 * @property string $cpf
 * @property string $rg
 * @property string $email
 * @property string $telefone
 * @property string $celular
 * @property string $cep
 * @property string $rua
 * @property string $numero
 * @property string $bairro
 * @property integer $idCidade
 * @property integer $idEstado
 *
 * @property Integrante[] $integrantes
 * @property Cidade $idCidade0
 * @property Estado $idEstado0
 */
class Pessoa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pessoa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'cpf', 'rg', 'email', 'cep', 'rua', 'numero', 'bairro', 'idCidade', 'idEstado'], 'required'],
            [['nome',  'email', 'rua','bairro','telefone','celular','cep'], 'string'],
            [['cpf','rg','numero'], 'integer'],
            [['idCidade', 'idEstado'], 'integer'],
            [['idCidade'], 'exist', 'skipOnError' => true, 'targetClass' => Cidade::className(), 'targetAttribute' => ['idCidade' => 'id']],
            [['idEstado'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['idEstado' => 'id']],
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
            'cpf' => 'CPF',
            'rg' => 'RG',
            'email' => 'Email',
            'telefone' => 'Telefone',
            'celular' => 'Celular',
            'cep' => 'CEP',
            'rua' => 'Rua',
            'numero' => 'Número',
            'bairro' => 'Bairro',
            'idCidade' => 'Cidade',
            'idEstado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIntegrantes()
    {
        return $this->hasMany(Integrante::className(), ['idPessoa' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCidade0()
    {
        return $this->hasOne(Cidade::className(), ['id' => 'idCidade']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstado0()
    {
        return $this->hasOne(Estado::className(), ['id' => 'idEstado']);
    }
}

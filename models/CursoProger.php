<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cursoProger".
 *
 * @property integer $id
 * @property string $nome
 * @property string $descricao
 * @property integer $idSituacao
 * @property integer $idAreaAtuacao
 * @property integer $idSetor
 * @property integer $interdepartamental
 * @property integer $interinstitucional
 * @property integer $cargaHoraria
 * @property string $dataInicio
 * @property string $dataFim
 * @property string $observacoes
 * @property integer $idTipoProger
 * @property integer $idProger
 * @property integer $idGestor
 *
 * @property AreaAtuacao $idAreaAtuacao0
 * @property Gestor $idGestor0
 * @property Setor $idSetor0
 * @property Situacao $idSituacao0
 * @property TipoProger $idTipoProger0
 */
class CursoProger extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cursoProger';
    }

    public function relations() {
        return array(
        'Integrante' => array(self::BELONGS_TO, 'Integrante', 'id'),
        );
    }

    /**
     * @inheritdoc
     */
    public function rules() 
    {
        return [
            [['nome'], 'required', 'message' => 'Informe o nome do Curso' ],
            [['descricao', 'idSituacao', 'idAreaAtuacao', 'idSetor', 'interdepartamental', 'interinstitucional', 'cargaHoraria', 'dataInicio', 'dataFim', 'idGestor'], 'required'],
            [['nome', 'descricao', 'observacoes'], 'string'],
            [['idSituacao', 'idAreaAtuacao', 'idSetor', 'interdepartamental', 'interinstitucional', 'cargaHoraria', 'idTipoProger', 'idProger', 'idGestor'], 'integer'],
            [['dataInicio', 'dataFim'], 'safe'],
            [['idAreaAtuacao'], 'exist', 'skipOnError' => true, 'targetClass' => AreaAtuacao::className(), 'targetAttribute' => ['idAreaAtuacao' => 'id']],
            [['idGestor'], 'exist', 'skipOnError' => true, 'targetClass' => Gestor::className(), 'targetAttribute' => ['idGestor' => 'id']],
            [['idSetor'], 'exist', 'skipOnError' => true, 'targetClass' => Setor::className(), 'targetAttribute' => ['idSetor' => 'id']],
            [['idSituacao'], 'exist', 'skipOnError' => true, 'targetClass' => Situacao::className(), 'targetAttribute' => ['idSituacao' => 'id']],
            [['idTipoProger'], 'exist', 'skipOnError' => true, 'targetClass' => TipoProger::className(), 'targetAttribute' => ['idTipoProger' => 'id']],

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
            'descricao' => 'Descrição',
            'idSituacao' => 'Situação',
            'idAreaAtuacao' => 'Área Atuação',
            'idSetor' => 'Setor',
            'interdepartamental' => 'Interdepartamental',
            'interinstitucional' => 'Interinstitucional',
            'cargaHoraria' => 'Carga Horária',
            'dataInicio' => 'Data Inicio',
            'dataFim' => 'Data Fim',
            'observacoes' => 'Observações',
            'idTipoProger' => 'Tipo Proger',
            'idProger' => 'Proger',
            'idGestor' => 'Gestor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAreaAtuacao0()
    {
        return $this->hasOne(AreaAtuacao::className(), ['id' => 'idAreaAtuacao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGestor0()
    {
        return $this->hasOne(Gestor::className(), ['id' => 'idGestor']);

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSetor0()
    {
        //return $this->hasOne(Setor::className(), ['id' => 'idSetor']);
        $setor = Setor::model()->findByPk(2);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSituacao0()
    {
        return $this->hasOne(Situacao::className(), ['id' => 'idSituacao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoProger0()
    {
        return $this->hasOne(TipoProger::className(), ['id' => 'idTipoProger']);
    }

    public function getInterdepartamental()
    {
        switch ($this->interdepartamental) {
            case 1:
                return 'Sim';
                break;

            case 0:
                return 'Não';
                break;
        }
    }

    public function getInterinstitucional()
    {
        switch ($this->interinstitucional) {
            case 1:
                return 'Sim';
                break;

            case 0:
                return 'Não';
                break;
        }
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


//class TableB extends ActiveRecord {
class Integrante extends \yii\db\ActiveRecord {
    
    public static function tableName()
    {
        return 'integrante';
    }

    public function relations() {
        return array(
        'CursoProger' => array(self::BELONGS_TO, 'CursoProger', 'id'),
        );
    }


    public function search() {
        
        $criteria = new CDbCriteria();
            $criteria->with = array('CursoProger');
         
            $criteria->compare('CursoProger.cp', Yii::app()->request->getParam('CursoProger'), true);
           
            $sort = new CSort();
            $sort->attributes = array(
                'CursoProger.cp' => array(
                    'asc' => 'CursoProger.cp ASC',
                    'desc' => 'CursoProger.cp DESC'
                ),
                '*'
            );
            return new CActiveDataProvider($this,
                array(
                    'criteria' => $criteria,
                    'sort' => $sort
                ));
    }
    
}  
<?php

namespace app\models;
use yii\base\Model;
use yiibr\brvalidator\CpfValidator;



class IntegrantePessoa extends Model {
    public $nomeProjeto;

//pessoa
    public $nome;
    public $cpf;
    public $rg;
    public $email;
    public $cep;
    public $rua;
    public $numero;
    public $bairro;
    public $idCidade;
    public $idEstado;
    public $telefone;
    public $celular;
//integrante
    public $idTipoVinculo;
    public $idTipoFuncao;
    public $idInstituicao;
    public $idSetor;
    public $idCurso;
    public $idPessoa;
    public $dataInicio;
    public $dataFim;
    public $ativo;
    public $matricula;
    public $cargaHoraria;
    public $idTipoProger;
    public $idProger;

    

    public function rules()
    {
        return [
        //pessoa
            [['nome', 'cpf', 'rg', 'email', 'cep', 'rua', 'numero', 'bairro', 'idCidade', 'idEstado'], 'required'],
            [['nome',  'email', 'rua','bairro', 'telefone','celular','cep'], 'string'],
            [['cpf','rg','numero'], 'integer'],
            [['idCidade', 'idEstado'], 'integer'],
            [['idCidade'], 'exist', 'skipOnError' => true, 'targetClass' => Cidade::className(), 'targetAttribute' => ['idCidade' => 'id']],
            [['idEstado'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['idEstado' => 'id']],
        //integrante
            [['idTipoVinculo', 'idTipoFuncao', 'idInstituicao', 'idSetor', 'idPessoa', 'dataInicio', 'dataFim', 'ativo', 'matricula', 'cargaHoraria', 'idTipoProger', 'idProger'], 'required'],
            [['idTipoVinculo', 'idTipoFuncao', 'idInstituicao', 'idSetor', 'idCurso', 'idPessoa', 'ativo', 'cargaHoraria', 'idTipoProger', 'idProger'], 'integer'],
            [['dataInicio', 'dataFim'], 'safe'],
            [['matricula'], 'integer'],
            [['idCurso'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['idCurso' => 'id']],
            [['idInstituicao'], 'exist', 'skipOnError' => true, 'targetClass' => Instituicao::className(), 'targetAttribute' => ['idInstituicao' => 'id']],
            [['idPessoa'], 'exist', 'skipOnError' => true, 'targetClass' => Pessoa::className(), 'targetAttribute' => ['idPessoa' => 'id']],
            [['idSetor'], 'exist', 'skipOnError' => true, 'targetClass' => Setor::className(), 'targetAttribute' => ['idSetor' => 'id']],
            [['idTipoFuncao'], 'exist', 'skipOnError' => true, 'targetClass' => TipoFuncao::className(), 'targetAttribute' => ['idTipoFuncao' => 'id']],
            [['idTipoProger'], 'exist', 'skipOnError' => true, 'targetClass' => TipoProger::className(), 'targetAttribute' => ['idTipoProger' => 'id']],
            [['idTipoVinculo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoVinculo::className(), 'targetAttribute' => ['idTipoVinculo' => 'id']],

        ];
    }

    
    public function attributeLabels()
    {
        return [
        //pessoa
            //'id' => 'ID',
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
        //integrante
            //'id' => 'ID',
            'idTipoVinculo' => 'Tipo Vínculo',
            'idTipoFuncao' => 'Tipo Função',
            'idInstituicao' => 'Instituição',
            'idSetor' => 'Setor',
            'idCurso' => 'Curso',
            'idPessoa' => 'idPessoa',
            'dataInicio' => 'Data Início',
            'dataFim' => 'Data Fim',
            'ativo' => 'Ativo',
            'matricula' => 'Matrícula',
            'cargaHoraria' => 'Carga Horária',
            'idTipoProger' => 'Tipo Proger',
            'idProger' => 'IdProger',
        ];
    }

}

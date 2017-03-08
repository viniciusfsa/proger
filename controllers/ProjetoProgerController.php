<?php

namespace app\controllers;

use Yii;
use app\models\ProjetoProger;
use app\models\Pessoa;
use app\models\search\ProjetoProgerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * ProjetoProgerController implements the CRUD actions for ProjetoProger model.
 */

/**
*
*
* Mudar a permissão de acesso de "cadastros basicos" para "gestao"!
*
*
*/

class ProjetoProgerController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'update', 'create', 'integrante', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProjetoProger models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(\Yii::$app->user->can('gerenciamento-cadastros-basicos')){
            $searchModel = new ProjetoProgerSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
    }

    /**
     * Displays a single ProjetoProger model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(\Yii::$app->user->can('gerenciamento-cadastros-basicos')){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        } else {
            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
    }


    /**
     * Creates a new ProjetoProger model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(\Yii::$app->user->can('gerenciamento-cadastros-basicos')){
            $model = new ProjetoProger();

            if ($model->load(Yii::$app->request->post()) && $model->save()) 
                $modelAux = new IntegrantePessoa();
                $modelAux->idProger = $model->id;
                $modelAux->idTipoProger = 4; //projeto == 4
                
                return $this->redirect(['integrante', 'model' => $modelAux]);
                //return Yii::$app->getResponse()->redirect(Url::to('index.php?r=pessoa%2Fcreate'));
                //return Yii::$app->getResponse()->redirect(Url::toRoute("pessoa/create"));
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        } else {
            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
    }

    /**
     * Creates a new ProjetoProger model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionIntegrante()
    {
        if(\Yii::$app->user->can('gerenciamento-cadastros-basicos')){
            $model = new IntegrantePessoa();
            $pessoa = new Pessoa();
            $integrante = new Integrante();
            $post = Yii::$app->request->post();



            if (($cadastroModel->load($post) && $cadastroModel->validate()) {

                $pessoa->nome = $model->nome;
                $pessoa->cpf = $model->cpf;
                $pessoa->rg = $model->rg;
                $pessoa->email = $model->email;
                $pessoa->telefone = $model->telefone;
                $pessoa->celular = $model->celular;
                $pessoa->cep = $model->cep;
                $pessoa->rua = $model->rua;
                $pessoa->numero = $model->numero;
                $pessoa->bairro = $model->bairro;
                $pessoa->idCidade = $model->idCidade;
                $pessoa->idEstado = $model->idEstado;

                $integrante->idTipoVinculo = $model->idTipoVinculo;
                $integrante->idTipoFuncao = $model->idTipoFuncao;
                $integrante->idInstituicao = $model->idInstituicao;
                $integrante->idSetor = $model->idSetor;
                $integrante->idCurso = $model->idCurso;
                //$integrante->idPessoa
                $integrante->dataInicio = $model->dataInicio;
                $integrante->dataFim = $model->dataFim;
                $integrante->ativo = $model->ativo;
                $integrante->matricula = $model->matricula;
                $integrante->cargaHoraira =$model->cargaHoraira;
                $integrante->idTipoProger = $model->idTipoProger;
                $integrante->idProger = $model->idProger;

                if($pessoa->save()){
                    $pessoaAux = Pessoa::find()->where("cpf=:cpf", [":cpf" => $pessoa->cpf])->one();
                    $integrante->idPessoa = $pessoaAux->id;
                    $integrante->save();
                    return $this->render('view', ['id' => $model->idProger]);
                } else {
                    return $this->render('integrante', ['model' => $model]);
                }


                return Yii::$app->getResponse()->redirect(Url::toRoute("pessoa/create"));
            } else {
                return $this->render('integrante', [
                    'model' => $model,
                ]);
            }
        } else {
            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
    }

    /**
     * Updates an existing ProjetoProger model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(\Yii::$app->user->can('gerenciamento-cadastros-basicos')){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        } else {
            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
    }

    /**
     * Deletes an existing ProjetoProger model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(\Yii::$app->user->can('gerenciamento-cadastros-basicos')){
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        } else {
            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
    }

    /**
     * Finds the ProjetoProger model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProjetoProger the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProjetoProger::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

    }
}

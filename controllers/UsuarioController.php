<?php

namespace app\controllers;

use Yii;
use yii\rbac\DbManager;
use app\models\Usuario;
use app\models\Gestor;
use app\models\UsuarioGestor;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\search\UsuarioSearch;
use yii\web\Response;
use yii\helpers\ArrayHelper;

/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends Controller
{
    public function behaviors()
    {
        return [
           'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'update', 'create', 'delete', 'redefinirsenha', 'minha-conta'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Usuario models.
     * @return mixed
     */
    public function actionIndex()
    {

        if(\Yii::$app->user->can('gerenciar-usuario')){

            $searchModel = new UsuarioSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
               'searchModel' => $searchModel, 
               'dataProvider' => $dataProvider,
           ]);

        }
        else{

            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }

    }

    /**
     * Displays a single Usuario model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $connection = \Yii::$app->db;        

        $sql = "SELECT g.nome from usuarioGestor ug 
        INNER JOIN gestor g ON ug.idGestor = g.id
        where idUsuario = ".$id;

        $command = $connection->createCommand($sql);
        $resultado = $command->queryAll();

        //var_dump($resultado);
        //die();

        if(\Yii::$app->user->can('gerenciar-usuario')){

            return $this->render('view', [
                'model' => $this->findModel($id),
                'gestores' =>$resultado,
            ]);

        }
        else{

            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }

    }

    public function actionMinhaConta($id)
    {

        $model = $this->findModel($id);
        $model->scenario = 'redefinirSenha'; 

        if(Yii::$app->request->isAjax){

            Yii::$app->response->format = Response::FORMAT_JSON;

            if ($model->load(Yii::$app->request->post()) && $model->save()) {

                return 'Senha alterada com sucesso!';

            }
            else{
                return 'Não foi possível alterar sua senha.';
            }

        }
        else{

            return $this->render('minha-conta', [
                'model' => $model,
            ]);

        }


    }

    /**
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        if(\Yii::$app->user->can('gerenciar-usuario')){

            $model = new Usuario();
            $gestores = Gestor::find()->all();            
            $model->scenario = 'cadastro';

            if ($model->load(Yii::$app->request->post()) ) {

                $model->verification_code = '123456789';
                $model->save();

                return $this->redirect(['index']);
                
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'gestores' => $gestores,
                ]);
            }

        }
        else{

            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }

    }

    /**
     * Updates an existing Usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        if(\Yii::$app->user->can('gerenciar-usuario')){

            $model = $this->findModel($id);             
            $gestores = Gestor::find()->all(); 
            $model->scenario = 'update';


            if ($model->load(Yii::$app->request->post()) && $model->save() ) {                   
                return $this->redirect(['index']);
            } else {                
                return $this->render('update', [
                    'model' => $model,
                    'todosGestores' => $gestores,
                ]);
            }

        }
        else{

            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }

    }

    /**
     * Deletes an existing Usuario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        if(\Yii::$app->user->can('gerenciar-usuario')){

            //Realiza uma consulta SQL para verificar se o usuário a ser excluído já possui ações gravadas no sistema. 
            //Se existir, ele não pode ser excluído.
            $connection = \Yii::$app->db;

            $sql = "DECLARE @idUsuario INT
                    SET @idUsuario = ".$id."

                    IF(

                    SELECT idUsuario FROM MovimentoSemCotas
                    WHERE idUsuario = @idUsuario

                    ) > 0 OR

                    (
                        SELECT idUsuario FROM MovimentoSemCotas
                        WHERE idUsuario = @idUsuario
                    ) > 0 OR
                    (
                        SELECT idUsuario FROM Digitais
                        WHERE idUsuario = @idUsuario
                    ) > 0 OR

                    (
                        SELECT idUsuario FROM HistoricoRemanejamento
                        WHERE idUsuario = @idUsuario
                    ) > 0 OR
                    (
                        SELECT idUsuario FROM TabelaLog
                        WHERE idUsuario = @idUsuario
                    ) > 0

                        SELECT '1'
                    ELSE
                        SELECT '0'";

            $command = $connection->createCommand($sql);
            $resultado = $command->queryOne();

            if($resultado[''] == 1){
                \Yii::$app->getSession()->setFlash('erro', 'Não é possível excluir este usuário pois já existem registros do mesmo no banco de dados.');
                return $this->redirect(['index']);
            }

            else if($resultado[''] == 0){

                $this->findModel($id)->delete();
                return $this->redirect(['index']);

            }

        }
        else{

            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }


    }

    public function actionRedefinirsenha($id)
    {

        if(\Yii::$app->user->can('gerenciar-usuario')){

            $model = $this->findModel($id);
            $model->scenario = 'redefinirSenha';

            if($model->senha == null){
                return $this->render('redefinirSenha', [
                    'model' => $model,
                ]);
            }

            else if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            } else {
                return $this->render('redefinirSenha', [
                    'model' => $model,
                ]);
            }

        }
        else{

            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
        
    }

    /**
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $connection = \Yii::$app->db;
        if (($model = Usuario::findOne($id)) !== null) {
            $model->gestores = $connection->createCommand('SELECT idGestor FROM usuarioGestor where idUsuario = '.$model->idUsuario)->queryColumn();
           // var_dump($model->gestores);
            //die();            
            //$model->gestores = ArrayHelper::getColumn($model->gestores, 'idGestor');
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

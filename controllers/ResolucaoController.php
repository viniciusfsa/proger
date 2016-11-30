<?php

namespace app\controllers;

use Yii;
use app\models\Resolucao;
use app\models\ResolucaoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ResolucaoController implements the CRUD actions for Resolucao model.
 */
class ResolucaoController extends Controller
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
                        'actions' => ['index', 'view', 'update', 'create','delete'],
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
     * Lists all Resolucao models.
     * @return mixed
     */
    public function actionIndex()
    {

         Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');

        if(\Yii::$app->user->can('gerenciar-resolucao')){
            $searchModel = new ResolucaoSearch();
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
     * Displays a single Resolucao model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(\Yii::$app->user->can('gerenciar-resolucao')){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
        else{
            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
    }

    /**
     * Creates a new Resolucao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(\Yii::$app->user->can('gerenciar-resolucao')){

            $model = new Resolucao();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
        else{
            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
    }

    /**
     * Updates an existing Resolucao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(\Yii::$app->user->can('gerenciar-resolucao')){

            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
        else{
            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
    }

    /**
     * Deletes an existing Resolucao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(\Yii::$app->user->can('gerenciar-resolucao')){
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }
        else{
            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
    }

    /**
     * Finds the Resolucao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Resolucao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Resolucao::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

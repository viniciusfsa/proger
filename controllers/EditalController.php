<?php

namespace app\controllers;

use Yii;
use app\models\Edital;
use app\models\search\EditalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EditalController implements the CRUD actions for Edital model.
 */
class EditalController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
           /* 'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'update', 'create','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],*/
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Edital models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(\Yii::$app->user->can('gerenciamento-cadastros-avancados')){

            $searchModel = new EditalSearch();
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
     * Displays a single Edital model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(\Yii::$app->user->can('gerenciamento-cadastros-avancados')){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
       else{
            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
    }

    /**
     * Creates a new Edital model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(\Yii::$app->user->can('gerenciamento-cadastros-avancados')){
            $model = new Edital();

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
     * Updates an existing Edital model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(\Yii::$app->user->can('gerenciamento-cadastros-avancados')){

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
     * Deletes an existing Edital model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(\Yii::$app->user->can('gerenciamento-cadastros-avancados')){
            
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }
       else{
            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
    }

    /**
     * Finds the Edital model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Edital the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Edital::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

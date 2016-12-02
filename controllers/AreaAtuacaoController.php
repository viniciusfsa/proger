<?php

namespace app\controllers;

use Yii;
use app\models\AreaAtuacao;
use app\models\search\AreaAtuacaoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AreaAtuacaoController implements the CRUD actions for AreaAtuacao model.
 */
class AreaAtuacaoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AreaAtuacao models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(\Yii::$app->user->can('gerenciamento-cadastros-basicos')){
            $searchModel = new AreaAtuacaoSearch(); 
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
     * Displays a single AreaAtuacao model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(\Yii::$app->user->can('gerenciamento-cadastros-basicos')){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
        else{
            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
    }

    /**
     * Creates a new AreaAtuacao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(\Yii::$app->user->can('gerenciamento-cadastros-basicos')){
            $model = new AreaAtuacao();

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
     * Updates an existing AreaAtuacao model.
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
        }
        else{
            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
    }

    /**
     * Deletes an existing AreaAtuacao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(\Yii::$app->user->can('gerenciamento-cadastros-basicos')){
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }
        else{
            throw new \yii\web\ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
    }

    /**
     * Finds the AreaAtuacao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AreaAtuacao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AreaAtuacao::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

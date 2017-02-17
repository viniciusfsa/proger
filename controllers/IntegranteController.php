<?php

namespace app\controllers;

use Yii;
use app\models\Integrante;
use app\models\Pessoa;
use app\models\search\Integrante as IntegranteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IntegranteController implements the CRUD actions for Integrante model.
 */
class IntegranteController extends Controller
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
     * Lists all Integrante models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IntegranteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Integrante model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Integrante model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Integrante();
        $modelPessoa = new Pessoa();

        if ($modelPessoa->load(Yii::$app->request->post())){
            $model->idPessoa = $modelPessoa->id;
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'modelPessoa' => $modelPessoa,
                ]);
            }
        }else{
            return $this->render('create', [
                'model' => $model,
                'modelPessoa' => $modelPessoa,
            ]);
        }
    }

    /**
     * Updates an existing Integrante model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$idPessoa)
    {
        $model = $this->findModel($id);
        $modelPessoa = $this->findModelPessoa($idPessoa);

        if (($modelPessoa->load(Yii::$app->request->post()) && $modelPessoa->save()) && ($model->load(Yii::$app->request->post()) && $model->save())) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelPessoa' => $modelPessoa,
            ]);
        }
    }

    /**
     * Deletes an existing Integrante model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id,$idPessoa)
    {
        $this->findModel($id)->delete();
        $this->findModelPessoa($idPessoa)->delete;

        return $this->redirect(['index']);
    }

    /**
     * Finds the Integrante model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Integrante the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Integrante::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelPessoa($id)
    {
        if (($model = Pessoa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

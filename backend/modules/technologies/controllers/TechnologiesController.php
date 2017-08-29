<?php

namespace backend\modules\technologies\controllers;

use Yii;
use backend\modules\technologies\models\Technologies;
use backend\modules\technologies\models\TechnologiesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TechnologiesController implements the CRUD actions for Technologies model.
 */
class TechnologiesController extends Controller
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
     * Lists all Technologies models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TechnologiesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Technologies model.
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
     * Creates a new Technologies model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Technologies();
        $model->techcatList = Technologies::getTechCategoryList();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        	$model->createdDate =  date("Y-m-d H:i:s");
        	$model->updatedDate = date('Y-m-d H:i:s');
        	$model->createdBy = Yii::$app->user->identity->id;
        	$model->updatedBy = Yii::$app->user->identity->id;
        	$model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Technologies model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->techcatList = Technologies::getTechCategoryList();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        	$model->updatedDate =  date("Y-m-d H:i:s");
        	$model->updatedBy = Yii::$app->user->identity->id;
        	$model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Technologies model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Technologies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Technologies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Technologies::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

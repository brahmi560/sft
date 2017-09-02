<?php

namespace backend\modules\technologiesinformation\controllers;

use Yii;
use backend\modules\technologiesinformation\models\TechnologiesInformation;
use backend\modules\technologiesinformation\models\TechnologiesInformationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\modules\technologies\models\Technologies;
use yii\web\UploadedFile;

/**
 * TechnologiesinformationController implements the CRUD actions for TechnologiesInformation model.
 */
class TechnologiesinformationController extends Controller
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
     * Lists all TechnologiesInformation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TechnologiesInformationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TechnologiesInformation model.
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
     * Creates a new TechnologiesInformation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TechnologiesInformation();
        $model->technologyList = Technologies::getTechnologiesList();
        if ($model->load(Yii::$app->request->post())) {
        $model->techInfoImage = UploadedFile::getInstance($model,'techInfoImage');
        	if($model->validate())
        	{
        	$model->createdDate =  date("Y-m-d H:i:s");
        	$model->updatedDate = date('Y-m-d H:i:s');
        	$model->createdBy = Yii::$app->user->identity->id;
        	$model->updatedBy = Yii::$app->user->identity->id;
        	
        	if(!(empty($model->techInfoImage)))
        	{
        		 
        		$imageName = time().$model->techInfoImage->name;
        		 
        		$model->techInfoImage->saveAs('technologyimages/'.$imageName );
        		 
        		$model->techInfoImage = 'technologyimages/'.$imageName;
        	}
        	$model->save();
        	
            return $this->redirect(['index']);
        	}
        	else{
        		return $this->render('create', [
        				'model' => $model,
        		]);
        	}
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TechnologiesInformation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->technologyList = Technologies::getTechnologiesList();
        $model->techInfoImageupdate = $model->techInfoImage;
        $model->techInfoImage = '';

        if ($model->load(Yii::$app->request->post()) ) {
        	$model->techInfoImage = UploadedFile::getInstance($model,'techInfoImage');
        	if($model->validate())
        	{
        	$model->updatedDate =  date("Y-m-d H:i:s");
        	$model->updatedBy = Yii::$app->user->identity->id;
        	if(!(empty($model->techInfoImage)))
        	{
        		 
        		$imageName = time().$model->techInfoImage->name;
        		 
        		$model->techInfoImage->saveAs('technologyimages/'.$imageName );
        		 
        		$model->techInfoImage = 'technologyimages/'.$imageName;
        	}
        	else {
        		$model->techInfoImage = $model->techInfoImageupdate;
        	}
        	$model->save();
            return $this->redirect(['index']);
        	}
        	else{
        		return $this->render('update', [
        				'model' => $model,
        		]);
        	}
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TechnologiesInformation model.
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
     * Finds the TechnologiesInformation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TechnologiesInformation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TechnologiesInformation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

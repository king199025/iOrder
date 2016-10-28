<?php

namespace frontend\modules\waiting\controllers;

use common\classes\Debug;
use Yii;
use frontend\modules\waiting\models\Waiting;
use frontend\modules\waiting\models\WaitingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WaitingController implements the CRUD actions for Waiting model.
 */
class WaitingController extends Controller
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
     * Lists all Waiting models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WaitingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Waiting model.
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
     * Creates a new Waiting model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Waiting();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //Debug::prn(Yii::$app->request->post());
            $searchModel = new WaitingSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            return $this->renderPartial('add_index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Waiting model.
     * If update is successful, the browser will be redirected to the 'view' page.

     * @return mixed
     */
    public function actionUpdate()
    {
        $model = $this->findModel(Yii::$app->request->post('id'));

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $searchModel = new WaitingSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            return $this->renderPartial('add_index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionEdit(){
       /* Debug::prn(Yii::$app->request->post('id'));*/
        $model = $this->findModel(Yii::$app->request->post('id'));

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $searchModel = new WaitingSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            return $this->renderPartial('add_index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        return true;
    }

    /**
     * Deletes an existing Waiting model.
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
     * Finds the Waiting model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Waiting the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Waiting::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDel(){
        Waiting::updateAll(['status' => 0], ['id' => Yii::$app->request->post('id')]);
    }

    public function actionUpdate_modal(){
        $model = $this->findModel(Yii::$app->request->post('id'));
        return $this->renderPartial('modal',['model' => $model]);


    }
}

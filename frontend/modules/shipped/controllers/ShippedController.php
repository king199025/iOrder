<?php

namespace frontend\modules\shipped\controllers;

use common\models\db\Packed;
use common\models\db\ShippedPacked;
use Yii;
use frontend\modules\shipped\models\Shipped;
use frontend\modules\shipped\models\ShippedSearch;
use yii\debug\models\search\Debug;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ShippedController implements the CRUD actions for Shipped model.
 */
class ShippedController extends Controller
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
     * Lists all Shipped models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ShippedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Shipped model.
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
     * Creates a new Shipped model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Shipped();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $id = Yii::$app->request->post('id-packed');

            $id = explode(',', $id);
            $k = array_pop($id);
            Packed::updateAll(['status' => 0], ['id' => $id]);
            foreach($id as $item){
                $shP = new ShippedPacked();
                $shP->shipped_id = $model->id;
                $shP->packed_id = $item;
                $shP->save();
            }

            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Shipped model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) /*&& $model->save()*/) {


            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Shipped model.
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
     * Finds the Shipped model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Shipped the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Shipped::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

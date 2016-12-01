<?php

namespace frontend\modules\stock\controllers;

use common\classes\Debug;
use common\models\db\Address;
use common\models\db\Waiting;
use Yii;
use frontend\modules\stock\models\Stock;
use frontend\modules\stock\models\StockSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StockController implements the CRUD actions for Stock model.
 */
class StockController extends Controller
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
     * Lists all Stock models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StockSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $address = Address::find()->orderBy('id DESC')->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'address' => $address,
        ]);
    }

    /**
     * Displays a single Stock model.
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
     * Creates a new Stock model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Stock();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {


            //$waiting = Waiting::find()->where(['LIKE', 'track_number', $model->number])->one();
            //$stock = Stock::find()->where(['LIKE', 'number', $model->track_number])->one();

            /*if(!empty($waiting)){
                $stock = Stock::find()->where(['id' => $model->id])->one();
                $stock->title = $waiting->title;
                //$stock->number = $model->track_number;
                $stock->link = $waiting->link;
                $stock->price = $waiting->price;
                //$stock->dt_add = time();
                $stock->dt_update = time();
                $stock->status = 1;
                $stock->save();
            }
            else{

            }*/


            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Stock model.
     * If update is successful, the browser will be redirected to the 'view' page.

     * @return mixed
     */
    public function actionUpdate()
    {
        $model = $this->findModel(Yii::$app->request->post('id'));

        if ($model->load(Yii::$app->request->post()) && $model->save()) {


            $searchModel = new StockSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->renderPartial('ajaxList', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Stock model.
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
     * Finds the Stock model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Stock the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Stock::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUpdate_modal(){
        $model = $this->findModel(Yii::$app->request->post('id'));
        return $this->renderPartial('modal',['model' => $model]);
    }


    public function actionPacked(){
        //Debug::prn(Yii::$app->request->post('id'));
        $id = explode(',', Yii::$app->request->post('id'));
        $k = array_pop($id);

        $stock = Stock::find()->where(['id' => $id])->orderBy('dt_add Desc')->all();

        return $this->renderPartial('packed', ['model' => $stock]);

        //Debug::prn($id);
    }


    public function actionSynchronize(){ $waiting = Waiting::find()->where(['status' => 1])->all();
        foreach ($waiting as $item){
            $stock = Stock::find()->where(['LIKE', 'track_number', $item->track_number])->andWhere(['status' => 1])->one();
            if(!empty($stock)){
                //$stock = Stock::find()->where(['id' => $model->id])->one();
                $stock->title = $item->title;
                //$stock->number = $model->track_number;
                $stock->link = $item->link;
                $stock->price = $item->price;
                //$stock->weiting = $stock->weiting;
                //$stock->dt_add = time();
                $stock->dt_update = time();
                $stock->status = 1;
                $stock->save();
//return $this->render('in');
//Debug::prn($stock->getErrors());
                Waiting::updateAll(['status' => 0], ['id' => $item->id]);

            }
        }

        return $this->redirect(['index']);
    }
}

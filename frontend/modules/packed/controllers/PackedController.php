<?php

namespace frontend\modules\packed\controllers;


use common\classes\Debug;
use common\models\db\Address;
use common\models\db\PackedStock;
use common\models\db\Stock;
use Yii;
use frontend\modules\packed\models\Packed;
use frontend\modules\packed\models\PackedSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PackedController implements the CRUD actions for Packed model.
 */
class PackedController extends Controller
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
     * Lists all Packed models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PackedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Packed model.
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
     * Creates a new Packed model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Packed();
        $model->save();
        $info = [];
        $info['id'] = $model->id;
        $info['number'] = 'TN' . str_pad($model->id, 4, "0", STR_PAD_LEFT);
        $result = json_encode($info);
        return $result;

/*\common\classes\Debug::prn(Yii::$app->request->post());
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $model->id;
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }*/
    }

    /**
     * Updates an existing Packed model.
     * If update is successful, the browser will be redirected to the 'view' page.

     * @return mixed
     */
    public function actionUpdate()
    {//\common\classes\Debug::prn(Yii::$app->request->post());
        $model = $this->findModel(Yii::$app->request->post('packed_id'));

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $idStock = Yii::$app->request->post('Packed');
            $idStock = $idStock['idStock'];
            $idStock = explode(',', $idStock);
            $k = array_pop($idStock);

             Stock::updateAll(['status' => 0], ['id' =>$idStock]);

            foreach ($idStock as $item) {
                $packStok = new PackedStock();
                $packStok->packed_id = $model->id;
                $packStok->stock_id = $item;
                $packStok->save();
            }

            //$packed = $this->findModel($model->id);
            $stock = Stock::find()->where(['id' => $idStock])->all();
            //Debug::prn($stock);

            $html = "Hello, JayKay. We have packed for you a new order: <br />Package Tracking Number: $model->number <br />Products: ";
            foreach ($stock as $item){
                $html .= $item->title . '(' . $item->track_number .  '),' . $item->weight . 'lb, ' . $item->price . '$ <br />';
            }

$address = Address::find()->where(['id' => $model->address_id])->one();
            $html .= "Address:  $address->country, $address->city, $address->address<br />Comment: $model->comment <br />Best regards, iOrder team. ";

            Yii::$app->mailer->compose()
                ->setFrom('dima_ftp@iwebit.ru')
                ->setTo('vl.lukashev@gmail.com')
                ->setSubject('New order')
                //->setTextBody('Текст сообщения')
                ->setHtmlBody($html)
                ->send();

//\common\classes\Debug::prn($idStock);
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Packed model.
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
     * Finds the Packed model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Packed the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Packed::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

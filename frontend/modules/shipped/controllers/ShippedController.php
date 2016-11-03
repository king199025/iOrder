<?php

namespace frontend\modules\shipped\controllers;

use common\classes\Debug;
use common\classes\Excel;
use common\models\db\Address;
use common\models\db\Packed;
use common\models\db\PackedStock;
use common\models\db\ShippedPacked;
use common\models\db\Stock;


use PHPExcel_Style_Alignment;
use PHPExcel_Style_Fill;
use Yii;
use frontend\modules\shipped\models\Shipped;
use frontend\modules\shipped\models\ShippedSearch;

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
            foreach ($id as $item) {
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

    public function actionGet_excel()
    {

        //$idShippped = Yii::$app->request->post('id');
        $idShipped = 3;


        $xls = Excel::php_excel();
        $xls->setActiveSheetIndex(0);
        $sheet = $xls->getActiveSheet();
        $sheet->setTitle('Shipped #' . $idShipped);

        $sheet->setCellValueByColumnAndRow(6, 1, 'Shipped #' . $idShipped);
        $sheet->setCellValueByColumnAndRow(8, 3, 'Адрес компании получателя');
        $sheet->setCellValueByColumnAndRow(0, 3, 'Адрес компании получателя');


        $sheet->setCellValueByColumnAndRow(0, 8, 'Track Number');
        $sheet->setCellValueByColumnAndRow(1, 8, 'Name company');
        $sheet->setCellValueByColumnAndRow(2, 8, 'Receiver name ');
        $sheet->setCellValueByColumnAndRow(3, 8, 'Name product');
        $sheet->setCellValueByColumnAndRow(4, 8, 'Count product');
        $sheet->setCellValueByColumnAndRow(5, 8, 'Weight');
        $sheet->setCellValueByColumnAndRow(6, 8, 'Price');
        $sheet->setCellValueByColumnAndRow(7, 8, 'Link');
        $sheet->setCellValueByColumnAndRow(8, 8, 'Address');

        $shippedPacked = ShippedPacked::find()->where(['shipped_id' => $idShipped])->all();
        $idPacked = [];
        foreach ($shippedPacked as $item) {
            $idPacked[] = $item->packed_id;
        }

        $packed = \common\models\db\Packed::find()->where(['id' => $idPacked])->all();

        //Debug::prn($packed->address_id);
        $i = 9;

        foreach ($packed as $item) {
            $address = Address::find()->where(['id' => $item->address_id])->one();


            $idStock = PackedStock::find()->where(['packed_id' => $item->id])->all();
            $stock = [];
            foreach ($idStock as $k) {
                $stock[] = $k->stock_id;
            }
            $sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('EEEEEE');
            $stockInfo = Stock::find()->where(['id' => $stock])->all();
                $j = $i;
            $sheet->setCellValueByColumnAndRow(0, $i, $item->number);

            foreach($stockInfo as $value){

                $sheet->setCellValueByColumnAndRow(1, $j, 'Подставить название компании');
                $sheet->setCellValueByColumnAndRow(2, $j, $address->first_name . ' ' . $address->last_name);
                $sheet->setCellValueByColumnAndRow(3, $j, $value->title);
                $sheet->setCellValueByColumnAndRow(4, $j, '1');
                $sheet->setCellValueByColumnAndRow(5, $j, '200lg');
                $sheet->setCellValueByColumnAndRow(6, $j, $value->price);
                $sheet->setCellValueByColumnAndRow(7, $j, $value->link);
                $sheet->setCellValueByColumnAndRow(8, $j, $address->country . ',' . $address->city . ',' . $address->address);
                $j++;
            }

            $sheet->mergeCellsByColumnAndRow(0,$i,0,$j-1);
            $style = array(
                'alignment' => array (
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_TOP
                )
            );
            $sheet->getStyleByColumnAndRow(0, $i)->applyFromArray($style);

            //$sheet->getStyle('A9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_TOP);
            //$sheet->setAActiveSheet()->mergeCells('A1:O10');

            //$sheet ->mergeCells(«A1:G1»);
            $i = $j;
        }


        /* $i = 2;
         foreach ($users as $user) {
             $sheet->setCellValueByColumnAndRow(0, $i, $user->data->ID);
             $sheet->setCellValueByColumnAndRow(1, $i, $user->data->user_email);
             $sheet->setCellValueByColumnAndRow(2, $i, $user->data->user_registered);
             $sheet->setCellValueByColumnAndRow(3, $i, get_user_meta($user->data->ID, 'my_promo', true));
             $sheet->setCellValueByColumnAndRow(4, $i, get_user_meta($user->data->ID, 'ref_promo', true));
             $sheet->setCellValueByColumnAndRow(5, $i, get_user_meta($user->data->ID, 'points', true));
             $i++;
         }*/

        //Debug::prn($_SERVER);
        $objWriter = Excel::php_write_excel($xls);
        $objWriter->save($_SERVER['DOCUMENT_ROOT'] . '/frontend/web/excel/export.xls');
        return '/frontend/web/excel/export.xls';
    }

}

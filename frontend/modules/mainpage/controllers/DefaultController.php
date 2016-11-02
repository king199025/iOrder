<?php

namespace frontend\modules\mainpage\controllers;

use common\classes\Debug;
use common\models\db\Stock;
use common\models\db\Waiting;
use yii\web\Controller;

/**
 * Default controller for the `mainpage` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $waiting = Waiting::find()->all();
        //$stock = Stock::find()->where(['status' => 1])->all();
        foreach($waiting as $item){
            $stock = Stock::find()->where(['LIKE', 'number', $item->track_number])->one();
            //Debug::prn($item);
            //$waiting = Waiting::find()->where(['LIKE', 'track_number', $item->number])->one();
            if(empty($stock)){
                $stockNew = new Stock();

                $stockNew->title = $item->title;
                $stockNew->number = $item->track_number;
                $stockNew->link = $item->link;
                $stockNew->price = $item->price;
                $stockNew->dt_add = time();
                $stockNew->dt_update = time();
                $stockNew->status = 1;

                $stockNew->save();
            }
        }

        //return $this->render('index');
    }
}

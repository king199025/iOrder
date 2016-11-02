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
        //$waiting = Waiting::find()->all();
        $stock = Stock::find()->where(['status' => 1])->all();
        foreach($stock as $item){
            $waiting = Waiting::find()->where(['LIKE', 'track_number', $item->number])->one();
            if(empty($waiting)){
                $waitingNew = new Waiting();
                $waitingNew->title = $item->title;
                $waitingNew->track_number = $item->number;
                $waitingNew->link = $item->link;
                $waitingNew->price = $item->price;
                $waitingNew->dt_add = time();
                $waitingNew->dt_update = time();

                $waitingNew->save();
            }
        }

        //return $this->render('index');
    }
}

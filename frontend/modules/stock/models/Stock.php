<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 31.10.2016
 * Time: 11:46
 */

namespace frontend\modules\stock\models;


use yii\db\ActiveRecord;

class Stock extends \common\models\db\Stock
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['dt_add', 'dt_update'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['dt_update'],
                ],
            ],
        ];
    }
}
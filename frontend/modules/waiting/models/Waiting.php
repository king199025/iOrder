<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 27.10.2016
 * Time: 16:20
 */

namespace frontend\modules\waiting\models;


use yii\db\ActiveRecord;

class Waiting extends \common\models\db\Waiting
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
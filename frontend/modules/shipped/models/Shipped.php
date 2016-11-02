<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 02.11.2016
 * Time: 15:17
 */

namespace frontend\modules\shipped\models;


use common\models\db\ShippedPacked;
use yii\db\ActiveRecord;

class Shipped extends \common\models\db\Shipped
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['dt_add'],
                ],
            ],
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getshipped_packed()
    {
        return $this->hasMany(ShippedPacked::className(), ['shipped_id' => 'id']);
    }
}
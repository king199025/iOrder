<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 01.11.2016
 * Time: 14:36
 */

namespace frontend\modules\packed\models;


use common\models\db\PackedStock;
use frontend\modules\address\models\Address;
use frontend\modules\stock\models\Stock;

class Packed extends \common\models\db\Packed
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getaddress()
    {
        return $this->hasOne(Address::className(), ['id' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getpacked_stock()
    {
        return $this->hasMany(PackedStock::className(), ['packed_id' => 'id']);
    }

}
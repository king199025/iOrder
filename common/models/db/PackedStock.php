<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "packed_stock".
 *
 * @property integer $id
 * @property integer $packed_id
 * @property integer $stock_id
 */
class PackedStock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'packed_stock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['packed_id', 'stock_id'], 'required'],
            [['packed_id', 'stock_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'packed_id' => 'Packed ID',
            'stock_id' => 'Stock ID',
        ];
    }
}

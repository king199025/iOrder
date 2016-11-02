<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "shipped_packed".
 *
 * @property integer $id
 * @property integer $shipped_id
 * @property integer $packed_id
 */
class ShippedPacked extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shipped_packed';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shipped_id', 'packed_id'], 'required'],
            [['shipped_id', 'packed_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shipped_id' => 'Shipped ID',
            'packed_id' => 'Packed ID',
        ];
    }
}

<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "packed".
 *
 * @property integer $id
 * @property integer $dt_add
 * @property string $idStock
 * @property integer $address_id
 * @property integer $price
 * @property string $number
 * @property string $comment
 * @property string $status
 */
class Packed extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'packed';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dt_add', 'address_id', 'price'], 'integer'],
            [['idStock', 'number', 'comment'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dt_add' => 'Dt Add',
            'idStock' => 'Id Stock',
            'address_id' => 'Address ID',
            'price' => 'Price',
            'number' => 'Number',
            'comment' => 'Comment',
            'status' => 'Status',
        ];
    }
}

<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property integer $id
 * @property string $title
 * @property string $number
 * @property double $weight
 * @property string $link
 * @property double $price
 * @property string $dt_add
 * @property integer $dt_update
 * @property integer $status
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number'], 'required'],
            [['weight', 'price'], 'number'],
            [['dt_add'], 'safe'],
            [['dt_update', 'status'], 'integer'],
            [['title', 'number', 'link'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'number' => 'Number',
            'weight' => 'Weight',
            'link' => 'Link',
            'price' => 'Price',
            'dt_add' => 'Dt Add',
            'dt_update' => 'Dt Update',
            'status' => 'Status',
        ];
    }
}

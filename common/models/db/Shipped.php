<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "shipped".
 *
 * @property integer $id
 * @property integer $dt_add
 */
class Shipped extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shipped';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dt_add'], 'integer'],
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
        ];
    }
}

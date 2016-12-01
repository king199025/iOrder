<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "waiting".
 *
 * @property integer $id
 * @property string $title
 * @property string $link
 * @property string $track_number
 * @property double $price
 * @property integer $dt_add
 * @property integer $dt_update
 * @property integer $status
 */
class Waiting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'waiting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'link', 'track_number', 'price'], 'required'],

            [['dt_add', 'dt_update', 'status'], 'integer'],
            [['title', 'link', 'track_number'], 'string', 'max' => 255],
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
            'link' => 'Link',
            'track_number' => 'Track Number',
            'price' => 'Price',
            'dt_add' => 'Dt Add',
            'dt_update' => 'Dt Update',
            'status' => 'Status',
        ];
    }
}

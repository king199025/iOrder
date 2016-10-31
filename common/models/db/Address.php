<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property string $city
 * @property string $zip_code
 * @property string $country
 * @property string $phone
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'address', 'city', 'zip_code', 'country', 'phone'], 'required'],
            [['first_name', 'last_name', 'address', 'city', 'zip_code', 'country', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'address' => 'Address',
            'city' => 'City',
            'zip_code' => 'Zip Code',
            'country' => 'Country',
            'phone' => 'Phone',
        ];
    }
}

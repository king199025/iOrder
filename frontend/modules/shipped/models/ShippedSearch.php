<?php

namespace frontend\modules\shipped\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\shipped\models\Shipped;

/**
 * ShippedSearch represents the model behind the search form about `frontend\modules\shipped\models\Shipped`.
 */
class ShippedSearch extends Shipped
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'dt_add'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Shipped::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        /*$query->andFilterWhere([
            'id' => $this->id,
            'dt_add' => $this->dt_add,
        ]);*/
        $query->leftJoin('shipped_packed', '`shipped_packed`.`shipped_id` = `shipped`.`id`');

        $query->orderBy('dt_add DESC');
        $query->with('shipped_packed');

        return $dataProvider;
    }
}

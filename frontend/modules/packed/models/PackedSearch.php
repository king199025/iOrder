<?php

namespace frontend\modules\packed\models;

use common\classes\Debug;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\packed\models\Packed;

/**
 * PackedSearch represents the model behind the search form about `frontend\modules\packed\models\Packed`.
 */
class PackedSearch extends Packed
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'dt_add', 'address_id', 'price'], 'integer'],
            [['idStock', 'number', 'comment', 'status'], 'safe'],
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
        $query = Packed::find();

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


        $query->leftJoin('address', '`address`.`id` = `packed`.`address_id`');
        $query->andWhere(['!=', '`packed`.`number`', 'NULL']);
        $query->andWhere(['`packed`.`status`' => 1]);


        // grid filtering conditions
        /*$query->andFilterWhere([
            'id' => $this->id,
            'dt_add' => $this->dt_add,
            'address_id' => $this->address_id,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'idStock', $this->idStock])
            ->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'status', $this->status]);*/

        $query->orderBy('`packed`.`dt_add` DESC');
        $query->with('address');
        //Debug::prn($query->createCommand()->rawSql);
        //die();
        return $dataProvider;
    }
}

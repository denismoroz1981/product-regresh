<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Offers;

/**
 * OffersSearch represents the model behind the search form of `common\models\Offers`.
 */
class OffersSearch extends Offers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
<<<<<<< HEAD
            [['admin_id', 'is_commercial', 'price', 'realty_type_id', 'floors_count', 'kitchen_square_meters', 'total_square_meters', 'realty_id', 'advert_type_id'], 'integer'],
           [['rooms_count'],'integer'],
=======
            [['admin_id', 'rooms_count', 'is_commercial', 'price', 'realty_type_id', 'floors_count', 'kitchen_square_meters', 'total_square_meters', 'realty_id', 'advert_type_id'], 'integer'],
>>>>>>> 2950e937746f0931d0afe4ab045a6a0d6d4c0bbb
            [['street_name', 'type', 'state_name', 'beautiful_url', 'description', 'currency_type', 'metro_station_name', 'wall_type', 'publishing_date', 'realty_type_name', 'latitude', 'main_photo', 'building_number_str', 'city_name', 'flat_number', 'date_end', 'district_name', 'advert_type_name', 'admin_time_entered'], 'safe'],
            [['living_square_meters'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
<<<<<<< HEAD



=======
>>>>>>> 2950e937746f0931d0afe4ab045a6a0d6d4c0bbb
        $query = Offers::find();

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
        $query->andFilterWhere([
            'admin_id' => $this->admin_id,
            'rooms_count' => $this->rooms_count,
            'is_commercial' => $this->is_commercial,
            'price' => $this->price,
            'living_square_meters' => $this->living_square_meters,
            'realty_type_id' => $this->realty_type_id,
            'floors_count' => $this->floors_count,
            'kitchen_square_meters' => $this->kitchen_square_meters,
            'total_square_meters' => $this->total_square_meters,
            'realty_id' => $this->realty_id,
            'advert_type_id' => $this->advert_type_id,
            'admin_time_entered' => $this->admin_time_entered,
        ]);

        $query->andFilterWhere(['like', 'street_name', $this->street_name])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'state_name', $this->state_name])
            ->andFilterWhere(['like', 'beautiful_url', $this->beautiful_url])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'currency_type', $this->currency_type])
<<<<<<< HEAD
            //->andFilterWhere(['in', 'rooms_count', $this->rooms_count])
            ->andFilterWhere(['in', 'metro_station_name', $this->metro_station_name])
=======
            ->andFilterWhere(['like', 'metro_station_name', $this->metro_station_name])
>>>>>>> 2950e937746f0931d0afe4ab045a6a0d6d4c0bbb
            ->andFilterWhere(['like', 'wall_type', $this->wall_type])
            ->andFilterWhere(['like', 'publishing_date', $this->publishing_date])
            ->andFilterWhere(['like', 'realty_type_name', $this->realty_type_name])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'main_photo', $this->main_photo])
            ->andFilterWhere(['like', 'building_number_str', $this->building_number_str])
            ->andFilterWhere(['like', 'city_name', $this->city_name])
            ->andFilterWhere(['like', 'flat_number', $this->flat_number])
            ->andFilterWhere(['like', 'date_end', $this->date_end])
            ->andFilterWhere(['like', 'district_name', $this->district_name])
            ->andFilterWhere(['like', 'advert_type_name', $this->advert_type_name]);

        return $dataProvider;
    }
}

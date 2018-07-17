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
            [['admin_id', 'price_item', 'rooms_count', 'is_commercial', 'realty_sale_type',
                'living_square_meters', 'realty_type_id', 'floors_count', 'kitchen_square_meters',
                'total_square_meters', 'realty_id', 'advert_type_id', 'floor', 'is_bargain',
                'priceUSD', 'c1501', 'c1502', 'c1503', 'c1504', 'c443', 'c1607', 'c1608', 'c1011',
                'c1464', 'c274', 'c265', 'c1437','user_id','agency_id'], 'integer'],
            [['street_name', 'type', 'state_name', 'beautiful_url', 'description',
                'currency_type', 'metro_station_name', 'wall_type', 'publishing_date',
                'realty_type_name', 'latitude', 'longitude', 'main_photo', 'building_number_str',
                'city_name', 'flat_number', 'date_end', 'district_name', 'advert_type_name',
                'price_type', 'created_at', 'levels_expired', 'is_exchange', 'user',
                'admin_time_entered'], 'safe'],
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
            'price_item' => $this->price_item,
            'rooms_count' => $this->rooms_count,
            'is_commercial' => $this->is_commercial,
            'realty_sale_type' => $this->realty_sale_type,
            'living_square_meters' => $this->living_square_meters,
            'realty_type_id' => $this->realty_type_id,
            'floors_count' => $this->floors_count,
            'kitchen_square_meters' => $this->kitchen_square_meters,
            'total_square_meters' => $this->total_square_meters,
            'realty_id' => $this->realty_id,
            'advert_type_id' => $this->advert_type_id,
            'floor' => $this->floor,
            'is_bargain' => $this->is_bargain,
            'priceUSD' => $this->priceUSD,
            'c1501' => $this->c1501,
            'c1502' => $this->c1502,
            'c1503' => $this->c1503,
            'c1504' => $this->c1504,
            'c443' => $this->c443,
            'c1607' => $this->c1607,
            'c1608' => $this->c1608,
            'c1011' => $this->c1011,
            'c1464' => $this->c1464,
            'c274' => $this->c274,
            'c265' => $this->c265,
            'c1437' => $this->c1437,
            'user_id' => $this->user_id,
            'agency_id' => $this->agency_id,
            'admin_time_entered' => $this->admin_time_entered,
        ]);

        $query->andFilterWhere(['like', 'street_name', $this->street_name])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'state_name', $this->state_name])
            ->andFilterWhere(['like', 'beautiful_url', $this->beautiful_url])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'currency_type', $this->currency_type])
            ->andFilterWhere(['like', 'metro_station_name', $this->metro_station_name])
            ->andFilterWhere(['like', 'wall_type', $this->wall_type])
            ->andFilterWhere(['like', 'publishing_date', $this->publishing_date])
            ->andFilterWhere(['like', 'realty_type_name', $this->realty_type_name])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longitude', $this->longitude])
            ->andFilterWhere(['like', 'main_photo', $this->main_photo])
            ->andFilterWhere(['like', 'building_number_str', $this->building_number_str])
            ->andFilterWhere(['like', 'city_name', $this->city_name])
            ->andFilterWhere(['like', 'flat_number', $this->flat_number])
            ->andFilterWhere(['like', 'date_end', $this->date_end])
            ->andFilterWhere(['like', 'district_name', $this->district_name])
            ->andFilterWhere(['like', 'advert_type_name', $this->advert_type_name])
            ->andFilterWhere(['like', 'price_type', $this->price_type])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'levels_expired', $this->levels_expired])
            ->andFilterWhere(['like', 'is_exchange', $this->is_exchange]);


        return $dataProvider;
    }
}

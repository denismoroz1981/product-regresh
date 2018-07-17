<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "offers".
 *
 * @property int $admin_id
 * @property string $street_name
 * @property int $price_item
 * @property int $rooms_count
 * @property string $type
 * @property int $is_commercial
 * @property string $state_name
 * @property string $beautiful_url
 * @property string $description
 * @property string $currency_type
 * @property string $metro_station_name
 * @property string $wall_type
 * @property string $publishing_date
 * @property string $realty_type_name
 * @property int $realty_sale_type
 * @property string $latitude
 * @property string $longitude
 * @property string $main_photo
 * @property string $building_number_str
 * @property string $city_name
 * @property int $living_square_meters
 * @property int $realty_type_id
 * @property int $floors_count
 * @property int $kitchen_square_meters
 * @property string $flat_number
 * @property int $total_square_meters
 * @property int $realty_id
 * @property string $date_end
 * @property string $district_name
 * @property string $advert_type_name
 * @property int $advert_type_id
 * @property string $price_type
 * @property string $created_at
 * @property string $levels_expired
 * @property string $is_exchange
 * @property int $floor
 * @property int $is_bargain
 * @property string $user
 * @property int $priceUSD
 * @property int $c1501
 * @property int $c1502
 * @property int $c1503
 * @property int $c1504
 * @property int $c443
 * @property int $c1607
 * @property int $c1608
 * @property int $c1011
 * @property int $c1464
 * @property int $c274
 * @property int $c265
 * @property int $c1437
 * @property string $admin_time_entered
 *
 * @property Comments[] $comments
 */
class Offers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'offers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price_item', 'rooms_count', 'is_commercial', 'realty_sale_type', 'living_square_meters',
                'realty_type_id', 'floors_count', 'kitchen_square_meters', 'total_square_meters',
                'realty_id', 'advert_type_id', 'floor', 'is_bargain', 'priceUSD', 'c1501', 'c1502',
                'c1503', 'c1504', 'c443', 'c1607', 'c1608', 'c1011', 'c1464', 'c274', 'c265', 'c1437',
                'user_id','agency_id'], 'integer'],
            [['admin_time_entered'], 'safe'],
            [['street_name', 'type', 'state_name', 'beautiful_url', 'description', 'currency_type',
                'metro_station_name', 'wall_type', 'publishing_date', 'realty_type_name', 'latitude',
                'longitude', 'main_photo', 'building_number_str', 'city_name', 'flat_number', 'date_end',
                'district_name', 'advert_type_name', 'price_type', 'created_at', 'levels_expired',
                'is_exchange'], 'string', 'max' => 255],
            [['realty_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'admin_id' => 'Admin ID',
            'street_name' => 'Street Name',
            'price_item' => 'Price Item',
            'rooms_count' => 'Rooms Count',
            'type' => 'Type',
            'is_commercial' => 'Is Commercial',
            'state_name' => 'State Name',
            'beautiful_url' => 'Beautiful Url',
            'description' => 'Description',
            'currency_type' => 'Currency Type',
            'metro_station_name' => 'Metro Station Name',
            'wall_type' => 'Wall Type',
            'publishing_date' => 'Publishing Date',
            'realty_type_name' => 'Realty Type Name',
            'realty_sale_type' => 'Realty Sale Type',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'main_photo' => 'Main Photo',
            'building_number_str' => 'Building Number Str',
            'city_name' => 'City Name',
            'living_square_meters' => 'Living Square Meters',
            'realty_type_id' => 'Realty Type ID',
            'floors_count' => 'Floors Count',
            'kitchen_square_meters' => 'Kitchen Square Meters',
            'flat_number' => 'Flat Number',
            'total_square_meters' => 'Total Square Meters',
            'realty_id' => 'Realty ID',
            'date_end' => 'Date End',
            'district_name' => 'District Name',
            'advert_type_name' => 'Advert Type Name',
            'advert_type_id' => 'Advert Type ID',
            'price_type' => 'Price Type',
            'created_at' => 'Created At',
            'levels_expired' => 'Levels Expired',
            'is_exchange' => 'Is Exchange',
            'floor' => 'Floor',
            'is_bargain' => 'Is Bargain',
            'user_id' => 'User ID',
            'agency_id' => 'Agency ID',
            'priceUSD' => 'Price Usd',
            'c1501' => 'C1501',
            'c1502' => 'C1502',
            'c1503' => 'C1503',
            'c1504' => 'C1504',
            'c443' => 'C443',
            'c1607' => 'C1607',
            'c1608' => 'C1608',
            'c1011' => 'C1011',
            'c1464' => 'C1464',
            'c274' => 'C274',
            'c265' => 'C265',
            'c1437' => 'C1437',
            'admin_time_entered' => 'Admin Time Entered',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['offers_id' => 'admin_id']);
    }
}

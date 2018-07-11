<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "offers".
 *
 * @property int $admin_id
 * @property string $street_name
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
 * @property int $price
 * @property string $realty_type_name
 * @property string $latitude
 * @property string $main_photo
 * @property string $building_number_str
 * @property string $city_name
 * @property double $living_square_meters
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
 * @property string $admin_time_entered
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
            [['rooms_count', 'is_commercial', 'price', 'realty_type_id', 'floors_count', 'kitchen_square_meters', 'total_square_meters', 'realty_id', 'advert_type_id'], 'integer'],
            [['living_square_meters'], 'number'],
            [['admin_time_entered'], 'safe'],
            [['street_name', 'type', 'state_name', 'beautiful_url', 'description', 'currency_type', 'metro_station_name', 'wall_type', 'publishing_date', 'realty_type_name', 'latitude', 'main_photo', 'building_number_str', 'city_name', 'flat_number', 'date_end', 'district_name', 'advert_type_name'], 'string', 'max' => 255],
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
            'price' => 'Price',
            'realty_type_name' => 'Realty Type Name',
            'latitude' => 'Latitude',
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
            'admin_time_entered' => 'Admin Time Entered',
        ];
    }





}

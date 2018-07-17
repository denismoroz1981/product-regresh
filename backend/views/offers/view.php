<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Offers */

$this->title = $model->admin_id;
$this->params['breadcrumbs'][] = ['label' => 'Offers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->admin_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->admin_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'admin_id',
            'street_name',
            'price_item',
            'rooms_count',
            'type',
            'is_commercial',
            'state_name',
            'beautiful_url:url',
            'description',
            'currency_type',
            'metro_station_name',
            'wall_type',
            'publishing_date',
            'realty_type_name',
            'realty_sale_type',
            'latitude',
            'longitude',
            'main_photo',
            'building_number_str',
            'city_name',
            'living_square_meters',
            'realty_type_id',
            'floors_count',
            'kitchen_square_meters',
            'flat_number',
            'total_square_meters',
            'realty_id',
            'date_end',
            'district_name',
            'advert_type_name',
            'advert_type_id',
            'price_type',
            'created_at',
            'levels_expired',
            'is_exchange',
            'floor',
            'is_bargain',
            'user_id',
            'agency_id',
            'priceUSD',
            'c1501',
            'c1502',
            'c1503',
            'c1504',
            'c443',
            'c1607',
            'c1608',
            'c1011',
            'c1464',
            'c274',
            'c265',
            'c1437',
            'admin_time_entered',
        ],
    ]) ?>

</div>

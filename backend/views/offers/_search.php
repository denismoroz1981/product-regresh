<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OffersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="offers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'admin_id') ?>

    <?= $form->field($model, 'street_name') ?>

    <?= $form->field($model, 'price_item') ?>

    <?= $form->field($model, 'rooms_count') ?>

    <?= $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'is_commercial') ?>

    <?php // echo $form->field($model, 'state_name') ?>

    <?php // echo $form->field($model, 'beautiful_url') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'currency_type') ?>

    <?php // echo $form->field($model, 'metro_station_name') ?>

    <?php // echo $form->field($model, 'wall_type') ?>

    <?php // echo $form->field($model, 'publishing_date') ?>

    <?php // echo $form->field($model, 'realty_type_name') ?>

    <?php // echo $form->field($model, 'realty_sale_type') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'main_photo') ?>

    <?php // echo $form->field($model, 'building_number_str') ?>

    <?php // echo $form->field($model, 'city_name') ?>

    <?php // echo $form->field($model, 'living_square_meters') ?>

    <?php // echo $form->field($model, 'realty_type_id') ?>

    <?php // echo $form->field($model, 'floors_count') ?>

    <?php // echo $form->field($model, 'kitchen_square_meters') ?>

    <?php // echo $form->field($model, 'flat_number') ?>

    <?php // echo $form->field($model, 'total_square_meters') ?>

    <?php // echo $form->field($model, 'realty_id') ?>

    <?php // echo $form->field($model, 'date_end') ?>

    <?php // echo $form->field($model, 'district_name') ?>

    <?php // echo $form->field($model, 'advert_type_name') ?>

    <?php // echo $form->field($model, 'advert_type_id') ?>

    <?php // echo $form->field($model, 'price_type') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'levels_expired') ?>

    <?php // echo $form->field($model, 'is_exchange') ?>

    <?php // echo $form->field($model, 'floor') ?>

    <?php // echo $form->field($model, 'is_bargain') ?>

    <?php // echo $form->field($model, 'user') ?>

    <?php // echo $form->field($model, 'priceUSD') ?>

    <?php // echo $form->field($model, 'c1501') ?>

    <?php // echo $form->field($model, 'c1502') ?>

    <?php // echo $form->field($model, 'c1503') ?>

    <?php // echo $form->field($model, 'c1504') ?>

    <?php // echo $form->field($model, 'c443') ?>

    <?php // echo $form->field($model, 'c1607') ?>

    <?php // echo $form->field($model, 'c1608') ?>

    <?php // echo $form->field($model, 'c1011') ?>

    <?php // echo $form->field($model, 'c1464') ?>

    <?php // echo $form->field($model, 'c274') ?>

    <?php // echo $form->field($model, 'c265') ?>

    <?php // echo $form->field($model, 'c1437') ?>

    <?php // echo $form->field($model, 'admin_time_entered') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

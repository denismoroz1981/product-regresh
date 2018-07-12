<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Offers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="offers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'street_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price_item')->textInput() ?>

    <?= $form->field($model, 'rooms_count')->textInput() ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_commercial')->textInput() ?>

    <?= $form->field($model, 'state_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'beautiful_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'currency_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'metro_station_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wall_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'publishing_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'realty_type_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'realty_sale_type')->textInput() ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'main_photo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'building_number_str')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'living_square_meters')->textInput() ?>

    <?= $form->field($model, 'realty_type_id')->textInput() ?>

    <?= $form->field($model, 'floors_count')->textInput() ?>

    <?= $form->field($model, 'kitchen_square_meters')->textInput() ?>

    <?= $form->field($model, 'flat_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_square_meters')->textInput() ?>

    <?= $form->field($model, 'realty_id')->textInput() ?>

    <?= $form->field($model, 'date_end')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'district_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'advert_type_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'advert_type_id')->textInput() ?>

    <?= $form->field($model, 'price_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'levels_expired')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_exchange')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'floor')->textInput() ?>

    <?= $form->field($model, 'is_bargain')->textInput() ?>

    <?= $form->field($model, 'user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'priceUSD')->textInput() ?>

    <?= $form->field($model, 'c1501')->textInput() ?>

    <?= $form->field($model, 'c1502')->textInput() ?>

    <?= $form->field($model, 'c1503')->textInput() ?>

    <?= $form->field($model, 'c1504')->textInput() ?>

    <?= $form->field($model, 'c443')->textInput() ?>

    <?= $form->field($model, 'c1607')->textInput() ?>

    <?= $form->field($model, 'c1608')->textInput() ?>

    <?= $form->field($model, 'c1011')->textInput() ?>

    <?= $form->field($model, 'c1464')->textInput() ?>

    <?= $form->field($model, 'c274')->textInput() ?>

    <?= $form->field($model, 'c265')->textInput() ?>

    <?= $form->field($model, 'c1437')->textInput() ?>

    <?= $form->field($model, 'admin_time_entered')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

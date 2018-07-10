<?php
/**
 * Created by PhpStorm.
 * User: denismoroz
 * Date: 25.05.18
 * Time: 6:20
 */
?>


<h2><b><?=$offers->advert_type_name?>, <?=$offers->rooms_count?> комн.,
    р-н <?=$offers->district_name?>, <?=$offers->street_name?>,
        <?=$offers->building_number_str?></b></h2>


<div class="body-content">

    <div class="row">
        <div class="col-lg-8">
            <? $img_source="https://cdn.riastatic.com/photosnew/dom/photo/".
                substr(substr($offers->beautiful_url,7),0,-14)."__".
                substr($offers->main_photo,-12,-4)."f.jpg" ?>
            <img src="<?=$img_source?>">
        </div>

    <div class="col-lg-4">
            <h1 style="color: green"><?=$offers->currency_type." ".number_format((float)$offers->price, $decimals=0,
                    $dec_point=",",$thousands_sep=" ")?></h1>
        <table>
<<<<<<< HEAD
            <tr><td>Metro station: </td><td><?=$offers->metro_station_name?></td></tr>
            <tr><td>District: </td><td><?=$offers->district_name?></td></tr>
            <tr style="border-bottom: 1px solid #ddd"><td>Address: </td><td><?=$offers->building_number_str?></td></tr>
            <tr><td>Rooms count: </td><td><b><?=$offers->rooms_count?></b></td></tr>
            <tr><td>Total square meters: </td><td><b><?=$offers->total_square_meters?></b></td></tr>
            <tr><td>Living square meters: </td><td><b><?=$offers->living_square_meters?></b></td></tr>
            <tr><td>Kitchen square meters: </td><td><b><?=$offers->kitchen_square_meters?></b></td></tr></tr>
=======
            <tr><td>Комнат: </td><td><?=$offers->rooms_count?></td></tr>
>>>>>>> 2950e937746f0931d0afe4ab045a6a0d6d4c0bbb

        </table>


        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <br>
            <? $form = \yii\widgets\ActiveForm::begin([
                    'action'=>['offers/comment','admin_id'=>$offers->admin_id],
                'method'=>'get'
            ])?>
            <?= $form -> field($commentForm,'comment')->textarea(
                ['class'=>'form-control','placeholder'=>'Your comment here...'])?>
            <?= \yii\helpers\Html::submitButton("Send"); ?>
            <? \yii\widgets\ActiveForm::end()?>
            <br>
            <b><h4>Comments</h4></b>
            <?

            foreach ($comments as $comment) {
                if ($comment->isapproved) {
                echo '<div class="thumbnail">';
              echo  '<p><b>'.$comment->user.'</b> <i>'.$comment->created_at.'</i></p>';
              echo  '<p>'.$comment->comment.'</p>';
              echo '</div>';}
            }

             ?>


        </div>

    </div>

<!--'street_name'=>'string',
'rooms_count'=>'integer',
'type'=>'string',
'is_commercial'=>'integer',
'state_name'=>'string',
'beautiful_url'=>'string',
'description'=>'string',
'currency_type'=>'string',
'metro_station_name'=>'string',
'wall_type'=>'string',
'publishing_date'=>'string',
'price'=>'integer',
'realty_type_name'=>'string',
'latitude'=>'string',
'main_photo'=>'string',
'building_number_str'=>'string',
'city_name'=>'string',
'living_square_meters'=>$this->float(),
'realty_type_id'=>'integer',
'floors_count'=>'integer',
'kitchen_square_meters'=>'integer',
'flat_number'=>'string',
'total_square_meters'=>'integer',
'realty_id'=>'int unique',
'date_end'=>'string',
'district_name'=>'string',
'advert_type_name'=>'string',
'advert_type_id'=>'integer',
'admin_time_entered'=>$this->dateTime().' DEFAULT NOW()'
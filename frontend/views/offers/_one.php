<?php
/**
 * Created by PhpStorm.
 * User: denismoroz
 * Date: 29.05.18
 * Time: 19:47
 */
?>

<div class="row">
    <div class="col-lg-12">

        <? $img_source="https://cdn.riastatic.com/photosnew/dom/photo/".
            substr(substr($model->beautiful_url,7),0,-14)."__".
            substr($model->main_photo,-12,-4)."f.jpg" ?>

        <h3 style="clear: left"><?= $model->rooms_count." rooms in ".$model->city_name.
            ", ".$model->street_name.
            " for <b>".$model->currency_type." ".$model->price.
            "</b>"?></h3>

        <img src="<?=$img_source?>" width="192" height="144" style="float: left;
                         margin-right: 10px">
        <div style="margin-left: 5px">
            <p ><i>
                    <?= $model->description; ?>
                </i></p>
        </div>
        <p style="clear: left"></p>


            <?= \yii\bootstrap\Html::a('details',['offers/one','url'=>$model->admin_id],
                    []) ?>

            </p>

    </div>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model common\models\Offers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="offers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'city')->dropDownList(['Kiev'=>'Kiev','Odessa'=>'Odessa']) ?>

    <?= $form->field($model, 'flats_number')->dropDownList([1=>1,2=>2,3=>3,4=>4,5=>5]) ?>

    <?=$form->field($model, 'address')->widget(Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 50,
            'plugins' => [
                'clips',
                'fullscreen',
            ],
        ],
    ]); ?>
    <!-- $form->field($model, 'address')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

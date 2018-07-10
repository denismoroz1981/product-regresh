<?php
/**
 * Created by PhpStorm.
 * User: denismoroz
 * Date: 25.05.18
 * Time: 6:19
 * @var $this yii\web\View
 * @var $dataProvider \yii\data\ActiveDataProvider
 *@var $searchModel common\models\OffersSearch */


use \yii\widgets\ListView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

$rooms_count = \yii\helpers\ArrayHelper::map(common\models\Offers::find()->
asArray()->orderBy("rooms_count")->
distinct()->all(),"rooms_count","rooms_count");
<<<<<<< HEAD
//$rooms_count=array_map("intval",$rooms_count);

=======
>>>>>>> 2950e937746f0931d0afe4ab045a6a0d6d4c0bbb
$metro_station_name = \yii\helpers\ArrayHelper::map(common\models\Offers::find()->
asArray()->orderBy("metro_station_name")->
distinct()->all(),"metro_station_name","metro_station_name");
?>

<div class="search-form">
    <?php $form = ActiveForm::begin(['method' => 'get']); ?>
    <h4><?= Html::label("Filters:") ?></h4>

    <div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
<<<<<<< HEAD
        <?= $form->field($searchModel, 'rooms_count')->widget(Select2::class, [
        'data' => $rooms_count,
        //'value'=>$rooms_count,
        //'language' => 'de',
        'options' => ['multiple'=>false,'placeholder' => 'Select rooms number ...'],
=======
        <?= $form->field($searchModel, 'rooms_count')->widget(Select2::classname(), [
        'data' => $rooms_count,
        //'value'=>$rooms_count,
        //'language' => 'de',
        'options' => ['multiple'=>true,'placeholder' => 'Select rooms number ...'],
>>>>>>> 2950e937746f0931d0afe4ab045a6a0d6d4c0bbb
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
        </div>
        <div class="col-md-9">
    <?= $form->field($searchModel, 'metro_station_name')->widget(Select2::classname(), [
        'data' => $metro_station_name,
<<<<<<< HEAD
        //'value'=>$metro_station_name,
=======
        'value'=>$metro_station_name,
>>>>>>> 2950e937746f0931d0afe4ab045a6a0d6d4c0bbb
        //'language' => 'de',
        'options' => ['multiple'=>true,'placeholder' => 'Select metro station ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
        </div>
    </div>


        <div class="row">
            <div class="col-md-12">
    <?= $form->field($searchModel,"description")->textarea(["rows"=>"1"]) ?>
            </div>
            </div>




    <div class="row">
    <?= Html::submitButton('Apply', ['class' => 'btn btn-success']) ?>
    <?= Html::a('Reset filters', ['index'], ['class' => 'btn btn-info']) ?>


    <?php ActiveForm::end(); ?>
    </div>
    </div>
</div>



<div>
        <?php echo ListView::widget([
                'dataProvider' => $dataProvider,
                //'searchModel' => $searchModel,
                'itemView' => '_one',
                ]);
        ?>
</div>

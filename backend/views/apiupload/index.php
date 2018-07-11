<?php
/* @var $this yii\web\View */
//use \yii\widgets\ActiveForm;
use yii\helpers\Html;

$api_key='tK5DsVHHZCjHlv81j9LiiQiiUWNryTQ1kmiXc5pZ';
?>
<h1>DOM.RIA API upload page</h1>
<style>
    hr {
        display: block;
        margin-top: 0.5em;
        margin-bottom: 0.5em;
        margin-left: auto;
        margin-right: auto;
        border-style: inset;
        border-width: 1px;
    }
    td {
        padding: 15px;
    }
    

</style>


<p>See instructions at <a href="https://developers.ria.com/dom_ria">developers.ria.com</a></p>

<p><b>developer's api_key:</b> <i><?= print_r($api_key) ?></i></p>

<?php

$api_key_updated = $api_key; // dev's API
$category=1; // Квартиры (Flats)
$realty_type=2; // Квартира (Flat)
$operation_type=1; //Продажа (Sales)
$state_id=10; //Kiev region
$city_id=10; //Kiev
$id = 11111111;
//$city='kiev';


echo Html::beginForm('uploadedlist','get',[]);
echo Html::label('api_key:');
echo Html::input('text','api_key',$api_key_updated,['size'=>40]);
echo '<br>';
echo '<br>';
echo '<table cellpadding="5px">';
echo '<tr>';
echo '<td>';
echo Html::label('category:');
echo Html::input('text','category',$category,['size'=>2]);
echo Html::label('realty type:');
echo Html::input('text','realty_type',$realty_type,['size'=>2]);
echo Html::label('operation type:');
echo Html::input('text','operation_type',$operation_type,['size'=>2]);
echo '<br>';
echo Html::submitButton('Show offer\'s categories',['name'=>'button','value'=>'btn_cat','class'=>'btn btn-primary']);
echo '</td>';
echo '<td>';
//echo '<br>';
//echo '<br>';
echo Html::label('state id:');
echo Html::input('text','state_id',$state_id,['size'=>2]);
echo Html::label('city id:');
echo Html::input('text','city_id',$city_id,['size'=>2]);
echo '<br>';
echo Html::submitButton('Upload offers',['name'=>'button','value'=>'btn_offer','class'=>'btn btn-primary']);
echo Html::submitButton('Save offers',['name'=>'button','value'=>'btn_save','class'=>'btn btn-success']);
echo Html::submitButton('Discard',['name'=>'button','value'=>'btn_discard','class'=>'btn btn-danger']);

echo '</td>';
echo '<td>';
//echo '<br>';
//echo '<br>';


echo Html::label('offer id:');
echo Html::input('text','id',$id,['size'=>10]);
echo '<br>';
echo Html::submitButton('Info by id',['name'=>'button','value'=>'btn_id','class'=>'btn btn-primary']);
echo '</td>';
echo '</tr>';
echo '</table>';
echo Html::endForm();



//echo '<br>';
echo '<hr>';
if (empty($title)) {$title='';}
if (empty($uploadedlist)) {$uploadedlist='';}
echo '<h3>'.print_r($title,1).'</h3>';
//echo "<h1>Uploaded real estate features from DOM.RIA api</h1><br />";
echo '<br>';
Kint::dump($uploadedlist);
?>


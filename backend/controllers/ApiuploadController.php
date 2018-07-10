<?php

namespace backend\controllers;

use common\models\Offers;
use Yii;

use common\models\OffersSearchModel;

//define("API_KEY","tK5DsVHHZCjHlv81j9LiiQiiUWNryTQ1kmiXc5pZ");

//function for pretty printing of JSON format


class ApiUpload {

    private $path;
    private $params;
    private $button;
    private $items_per_request;
    private $items_per_day;
    private $title;
    private $isCommon;
    private $apiDb = [
        "btn_cat"=>[
            "path"=>"https://developers.ria.com/dom/options?",
            "items_per_request"=>NULL,
            "items_per_day"=>1000,
            "title" =>"Realty categories from DOM.RIA",
            "isCommon"=>true
        ],
        "btn_id"=>[
            "path"=>"https://developers.ria.com/dom/info/",
            "items_per_request"=>1,
            "items_per_day"=>1000,
            "title" =>"Realty categories from DOM.RIA",
            "isCommon"=>false

        ],
        "btn_offer"=>[
            "path"=>"https://developers.ria.com/dom/search?",
            "items_per_request"=>100,
            "items_per_day"=>1000,
            "title" =>"Realty categories from DOM.RIA",
            "isCommon"=>true
        ]
    ];

    public function __construct(array $params)
    {
        $this->params = $params;
        $this->button = $this->params["button"];
        $this->path = $this->apiDb[$this->button]["path"];
        $this->items_per_request = $this->apiDb[$this->button]["items_per_request"];
        $this->items_per_day = $this->apiDb[$this->button]["items_per_day"];
        $this->title = $this->apiDb[$this->button]["title"];
        $this->isCommon = $this->apiDb[$this->button]["isCommon"];
    }



    private function getDataCommon() {

        try {
            foreach ($this->params as $k => $v) {
                $this->path .= "$k" . "=" . "$v" . "&";
            }

            $data = json_decode(file_get_contents($this->path), true);
            if (empty($data["count"])) {
                return ["uploadedlist" => $data, "title" => $this->title];
            }
            if (count($data["items"]) >= $data["count"]) {
                return ["uploadedlist" => $data, "title" => $this->title];
            }
            if (count($data["items"]) < $data["count"]) {
                $iter = ceil($data["count"] / $this->items_per_request); //number of interations
                $data_v=array_values($data["items"]);
                //for ($i = 0; $i <$iter; $i++) {// whole data
                    for ($i = 1; $i <1; $i++) { //only one page for debagging
                    $path_iter = $this->path . "page=" . print_r($i, 1);

                    $data_iter = json_decode(file_get_contents($path_iter), true);
                    $data_iter= array_values($data_iter["items"]);
                    $data_v = array_merge($data_v,$data_iter);
                }
                $_SESSION["data_id"] = $data_v;
                $_SESSION["api_key"] = $this->params["api_key"];
                return ["uploadedlist" => $data_v, "title" => $this->title];
            }
        } catch (\Exception $e) {
            return ["uploadedlist"=>"","title"=>$e->getMessage()];
        }
    }

    public function getData() {
        if ($this->isCommon) { return $this->getDataCommon();}
        if ($this->button == "btn_id") {
            $data = self::getDataByID($this->params["id"],$this->params["api_key"]);
            return ["uploadedlist" => $data, "title" => $this->title];
        }
    }

    //get ads info by id
    static function getDataByID($id,$api_key) {
        $path = "https://developers.ria.com/dom/info/".print_r($id,1).
            "?api_key=".print_r($api_key,1);

        return json_decode(file_get_contents($path),true);

    }

    static function saveToDB() { // save data uploaded from API to DB
        //$offers=Offers::find();
        //$model->id = 1
        try {
            $realty_id_raw = Offers::find()->select("realty_id")->asArray()->all();
            $realty_id=[];
            foreach ($realty_id_raw as $v) {
                $realty_id[] = intval ($v["realty_id"]);
            }

            if (!empty($realty_id)) {
                $diff_id =
                    //array_merge(array_diff($realty_id, $_SESSION["data_id"]),
                    array_diff($_SESSION["data_id"],$realty_id)
            //)
                ;
            } else {
                $diff_id = $_SESSION["data_id"];
            }
        } catch (\Exception $e) {
            return ["uploadedlist"=>$realty_id,"title"=>$e->getMessage()];
        }

        


        foreach ($diff_id as $id) {
            $offer = self::getDataByID($id, $_SESSION["api_key"]);
            //$offer = self::getDataByID("14005240", $_SESSION["api_key"]);
            $offer_keys = array_keys($offer);


            $model = new Offers();
            $isExists=[];
            foreach ($offer_keys as $k=>$offer_key) {
                if ($model->hasProperty($offer_key)) {
                    $model[$offer_key] = $offer[$offer_key];
                    $isExists[]=true;
                }

            }
            $model->save();
        }
        return ["uploadedlist" => $realty_id, "title" => "uploaded"];
            /*
            $model->street_name = $offer['street_name'];
            $model->rooms_count = $offer['rooms_count'];
            $model->type=$offer['type'];
            $model->is_commercial=$offer['is_commercial'];
            $model->state_name=$offer['state_name'];
            $model->beautiful_url=$offer['beautiful_url'];
            $model->description=$offer['description'];
            $model->currency_type=$offer['currency_type'];
            if (!empty($offer['metro_station_name'])) {
            $model->metro_station_name=$offer['metro_station_name'];}
            $model->wall_type=$offer['wall_type'];
            $model->publishing_date=$offer['publishing_date'];
            $model->price=$offer['price'];
            $model->realty_type_name=$offer['realty_type_name'];
            $model->latitude=$offer['latitude'];
            $model->building_number_str=$offer['building_number_str'];
            $model->city_name=$offer['city_name'];
            $model->living_square_meters=$offer['living_square_meters'];
            $model->realty_type_id=$offer['realty_type_id'];
            $model->floors_count=$offer['floors_count'];
            $model->kitchen_square_meters=$offer['kitchen_square_meters'];
            $model->flat_number=$offer['flat_number'];
            $model->total_square_meters=$offer['total_square_meters'];
            $model->realty_id=$offer['realty_id'];
            $model->date_end=$offer['date_end'];
            $model->district_name=$offer['district_name'];
            $model->advert_type_name=$offer['advert_type_name'];
            $model->advert_type_id=$offer['advert_type_id'];
            $model->save();
              }
            */



    }

}



class ApiuploadController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }





    public function actionUploadedlist() {


        function toCsv($array) {
            $f = fopen("admin.csv","w");

            foreach ($array["characteristics_values"] as $k => $v) {
                $array["char_".$k] = $v;

            }

            foreach ($array["priceArr"] as $k => $v) {
                $array["price_".$k] = $v;

            }



            fputcsv($f,array_keys($array));
            fputcsv($f,$array);
            fclose($f);

        }


        echo 'Uploaded json from RIA.DOM';

        $request=Yii::$app->request->get();
        if ($request["button"]=="btn_save") {
            $uploadedlist = ApiUpload::saveToDB();


        } else {
            $ul = new ApiUpload($request);
            $uploadedlist = $ul->getData();
        }
        return $this->render('index',
            $uploadedlist);

    }

}


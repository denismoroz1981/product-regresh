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
    private $items_per_hour;
    private $title;
    private $isCommon;
    private $apiDb = [
        "btn_cat"=>[
            "path"=>"https://developers.ria.com/dom/options?",
            "items_per_request"=>NULL,
            "items_per_hour"=>1000,
            "title" =>"Realty categories from DOM.RIA",
            "isCommon"=>true
        ],
        "btn_id"=>[
            "path"=>"https://developers.ria.com/dom/info/",
            "items_per_request"=>1,
            "items_per_hour"=>1000,
            "title" =>"Realty categories from DOM.RIA",
            "isCommon"=>false

        ],
        "btn_offer"=>[
            "path"=>"https://developers.ria.com/dom/search?",
            "items_per_request"=>100,
            "items_per_hour"=>1000,
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
                for ($i = 0; $i <$iter; $i++) {// whole data
                //    for ($i = 1; $i <1; $i++) { //only one page for debugging
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

    //the approach is column names taken from API request are equal to column names in Offers DB
    //except for characteristics with numerial name, in DB they are accoumpanied with prefix "c"
    // and fields

    static function saveToDB() { // save data uploaded from API to DB
        //$offers=Offers::find();
        //$model->id = 1
        try {
            //removing items which are already in the database
            //taking realty ids which are already in the database
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

        //$offer = self::getDataByID("14005240", $_SESSION["api_key"]);
        //$offer_keys = array_keys($offer);
        //echo gettype($offer_keys);
        //$realty_id = $offer["characteristics_values"];


        foreach ($diff_id as $id) {
            $offer = self::getDataByID($id, $_SESSION["api_key"]);
            //$offer = self::getDataByID("14005240", $_SESSION["api_key"]);
            //to get keys for checking
            $offer_keys = array_keys($offer);

            $model = new Offers();
            $isExists=[];
            //saving all items except for having prefix "c"
            foreach ($offer_keys as $k=>$offer_key) {
                if ($model->hasProperty($offer_key)) {
                    $model[$offer_key] = $offer[$offer_key];
                    $isExists[] = true;
                }
            }
             //saving items having prefix "c"
            if (!empty($offer["characteristics_values"])) {
                $offerChars = $offer["characteristics_values"];
                $offer_keysChars = array_keys($offerChars);
                foreach ($offer_keysChars as $k => $offer_key) {
                    if ($model->hasProperty("c" . $offer_key)) {
                        $model["c" . $offer_key] = round($offerChars[$offer_key]);
                        $isExists[] = true;
                    }

                }
            }
        //saving data about Agency
        if (!empty($offer["agency"])) {
            $offerAgency = $offer["agency"];
            $offer_keysAgency = array_keys($offerAgency);
            foreach ($offer_keysAgency as $k => $offer_key) {
                if ($model->hasProperty($offer_key)) {
                    $model[$offer_key] = round($offerAgency[$offer_key]);
                    $isExists[] = true;
                }

            }
        }
            //saving "user" and "priceUSD"
            //to add agency id like $model["agency_id"] = $offer_keys["user"]["name"];
            $model["priceUSD"] = round($offer["priceArr"][1]);

        $model->save(false);
        }
        return ["uploadedlist" => $realty_id, "title" => "uploaded"];

            /*
            'admin_id' => 'Admin ID',
            'street_name' => 'Street Name',
            'price_item' => 'Price Item',
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
            'realty_type_name' => 'Realty Type Name',
            'realty_sale_type' => 'Realty Sale Type',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
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
            'price_type' => 'Price Type',
            'created_at' => 'Created At',
            'levels_expired' => 'Levels Expired',
            'is_exchange' => 'Is Exchange',
            'floor' => 'Floor',
            'is_bargain' => 'Is Bargain',
            'user' => 'User',
            'priceUSD' => 'Price Usd',
            'c1501' => 'C1501',
            'c1502' => 'C1502',
            'c1503' => 'C1503',
            'c1504' => 'C1504',
            'c443' => 'C443',
            'c1607' => 'C1607',
            'c1608' => 'C1608',
            'c1011' => 'C1011',
            'c1464' => 'C1464',
            'c274' => 'C274',
            'c265' => 'C265',
            'c1437' => 'C1437',
            'admin_time_entered' => 'Admin Time Entered',
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


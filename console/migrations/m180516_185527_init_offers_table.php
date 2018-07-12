<?php

use yii\db\Migration;

/**
 * Class m180516_185527_init_offers_table
 */
class m180516_185527_init_offers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $this->createTable('offers',
             [


                 'admin_id'=>'pk',
                 'street_name'=>'string',
                 'price_item'=>'integer',
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
                 //'price'=>'integer',
                 'realty_type_name'=>'string',
                 'realty_sale_type'=>'integer',
                 'latitude'=>'string',
                 'longitude'=>'string',
                 'main_photo'=>'string',
                 'building_number_str'=>'string',
                 'city_name'=>'string',
                 'living_square_meters'=>'integer',
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
                 'price_type'=>'string',
                 'created_at'=>'string',
                 'levels_expired'=>'string',
                 'is_exchange'=>'string',
                 'floor'=>'integer',
                 'is_bargain'=>'integer',
                 'user'=>'string',
                 'priceUSD'=>'integer',//add entering
                 'c1501'=>'integer', //кухня-студия
                 'c1502'=>'integer', //многоуровневая
                 'c1503'=>'integer', //с мансардой
                 'c1504'=>'integer', //пентхаус
                 'c443'=>'integer', //год постройки
                 'c1607'=>'integer', //тариф ЖКХ зима
                 'c1608'=>'integer', //тариф ЖКХ лето
                 'c1011'=>'integer', //цена договорная
                 'c1464'=>'integer', //цена стартовая
                 'c274'=>'integer', //возможна рассрочка/кредит
                 'c265'=>'integer', //возможен обмен
                 'c1437'=>'integer', //тип предложения


                 //'admin_time_entered'=>$this->dateTime().' DEFAULT NOW()',
                 'admin_time_entered'=>'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP'

                 //'admin_time_entered'=>$this->dateTime().' DEFAULT NOW()'

             ],
               'ENGINE=InnoDB', 'CHARACTER SET=utf8','COLLATE=utf8_general_ci'
             );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('offers');
        //echo "m180516_185527_init_offers_table cannot be reverted.\n";

        //return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180516_185527_init_offers_table cannot be reverted.\n";

        return false;
    }
    */
}

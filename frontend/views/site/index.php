<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';


?>
<div class="site-index">

    <div class="jumbotron" style=" background: url(/assets/panorama_night1.jpg) no-repeat center; background-size: 100% auto">
        <h1 style="color: yellow">Greetings!</h1>

        <p class="lead" style="color: yellow">You are at the best site with appartments for sale ads!</p>

        <!--<p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">
        Get started with Yii</a></p> -->
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-8">
                <h2>Real offers</h2>
                <?php for ($i=0;$i<3;$i++)
                { ?>

                    <? $img_source="https://cdn.riastatic.com/photosnew/dom/photo/".
                    substr(substr($offers[$i]->beautiful_url,7),0,-14)."__".
                    substr($offers[$i]->main_photo,-12,-4)."f.jpg" ?>

                    <h3 style="clear: left"><?= $offers[$i]->rooms_count." rooms in ".$offers[$i]->city_name.
                ", ".$offers[$i]->street_name.
                " for <b>".$offers[$i]->currency_type." ".$offers[$i]->price.
                    "</b>"?></h3>

                    <img src="<?=$img_source?>" width="192" height="144" style="float: left;
                         margin-right: 10px">
                <div style="margin-left: 5px">
                    <p ><i>
                        <?= $offers[$i]->description; ?>
                    </i></p>
                </div>
                    <p style="clear: left"></p>
                <? } ?>
                <p><a class="btn btn-lg btn-success" href="offers" style="clear: left">
                        see other offers</a></p>
            </div>

            <div class="col-lg-4">
<<<<<<< HEAD
                <h2>Are you seeking real estate?</h2>

                <p>This is the best site for people who seek appartments to live or invest money.
                A lot of fresh ads from all Kiev's districts are waiting for you. </p>
                <p>If you find an appartment you want to buy feel free to refer to us by phone
                    <b>+1-111-1111-1111</b> </p>

=======
                <h2>Guest book</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
>>>>>>> 2950e937746f0931d0afe4ab045a6a0d6d4c0bbb
            </div>
        </div>

    </div>
</div>

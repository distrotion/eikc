<?php
    $this->title = 'AHC';
    $title = Yii::$app->language."_title";
    $caption = Yii::$app->language."_caption";
    $thumbImage = Yii::$app->language."_thumb_image";
?>

<div class="section_main_img" id="facilities_main_img">
            
</div>

<div class="container-fluid have_main_img normal_container" style="border-bottom:0;">
    
    <h1 class="section_name"><?= Yii::t('app', 'Menu_Room') ?></h1>

    <div id="room_slide_container">
        <div id="room_slide">
            <?php foreach ($rooms as $room) : ?>
            <div class="slide">
                <img src="<?= str_replace("../aikchol/web/", "./", $room->$thumbImage) ?>" alt="">
                <h2><?= $room->$title ?></h2>
                <div class="room_slide_detail">
                    <h2><?= $room->$title?></h2>
                    <p><?= $room->$caption?></p>
                    <a href="<?= Yii::$app->urlManager->createUrl(['site/room', "id" => $room->id])?>" class="hover_btn2"><?= Yii::t('app', 'Btn_More') ?></a>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        <a href="" id="next_btn"></a>
        <a href="" id="prev_btn"></a>
    </div>
    
</div>

<div class="container">
    <div class="row">
        <div class="dotted_line col-xs-12"></div>
    </div>
</div>

<div class="container-fluid normal_container" style="border-bottom:0;">
    
    <h1 class="section_name"><?= Yii::t('app', 'Menu_Environment') ?></h1>

    <div class="award_main_img facilities_main_img">
        <div class="social_main_detail">
            <div class="social_main_detail_text">
                <a href="<?= Yii::$app->urlManager->createUrl(['site/environment'])?>" class="hover_btn3"><?= Yii::t('app', 'Btn_More') ?></a>
            </div>
        </div>
    </div>
    
</div>

<div class="container">
    <div class="row">
        <div class="dotted_line col-xs-12"></div>
    </div>
</div>

<?= $this->render("//layouts/service") ?>
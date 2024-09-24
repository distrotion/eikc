<?php
$this->title = 'AHC';

$thumbImage = Yii::$app->language."_thumb_image";
$title = Yii::$app->language."_title";
$desc = Yii::$app->language."_desc";
?>

<div class="section_main_img" id="about_main_img">
            
</div>

<div class="container have_main_img normal_container">
    <div class="row">
        <h1 class="section_name"><?= Yii::t('app', 'Menu_History') ?></h1>
    </div>

    <div class="row">
        <img src="images/about/timeline_<?= Yii::$app->language ?>.jpg" alt="" class="img-responsive" id="timeline_img">

        <div class="text-center">
            <a href="https://www.youtube.com/watch?v=H32_w8mL5RE" target="blank"><?= Yii::t('app', 'YT_History') ?></a>
        </div>
        <div class="col-xs-12 align_center2">
            <a href="<?= Yii::$app->urlManager->createUrl(['site/history'])?>" class="hover_btn2"><?= Yii::t('app', 'Btn_More') ?></a>
        </div>
    </div>
</div>

<div class="container normal_container" style="padding-top:0;">
    <div class="row">
        <h1 class="section_name"><?= Yii::t('app', 'Menu_Vision') ?></h1>
    </div>

    <div class="row">
        <p id="mission_list">“<?= Yii::t('app', 'Vision_Title') ?>”</p>
        <div class="col-xs-12 align_center2">
            <a href="<?= Yii::$app->urlManager->createUrl(['site/vision'])?>" class="hover_btn2"><?= Yii::t('app', 'Btn_More') ?></a>
        </div>
    </div>
</div>

<div class="container normal_container" style="padding-top:0;">
    <div class="row">
        <h1 class="section_name"><?= Yii::t('app', 'Menu_Mission') ?></h1>
    </div>

    <div class="row">
        <p id="mission_list"><?= Yii::t('app', 'Mission_Title') ?></p>
        <div class="col-xs-12 align_center2">
            <a href="<?= Yii::$app->urlManager->createUrl(['site/mission'])?>" class="hover_btn2"><?= Yii::t('app', 'Btn_More') ?></a>
        </div>
    </div>
</div>

<div class="container normal_container" style="padding-top:0;">
    <div class="row">
        <h1 class="section_name"><?= Yii::t('app', 'Menu_Pride') ?></h1>
    </div>

        <div class="award_main_img">
            <div class="social_main_detail">
                <div class="social_main_detail_text">
                    <a href="<?= Yii::$app->urlManager->createUrl(['site/pride'])?>" class="hover_btn3"><?= Yii::t('app', 'Btn_More') ?></a>
                </div>
            </div>
        </div>
</div>

<div class="container normal_container" id="csr_home" style="padding-top:0;">
    <div class="row">
        <h1 class="section_name"><?= Yii::t('app', 'Menu_CSR') ?></h1>
    </div>

    <?php foreach ($csrs as $csr) : ?>
    <div class="row" style="position:relative;">
        <div class="col-sm-6 col-xs-12">
            <img src="<?= str_replace("../aikchol/web", "./", $csr->$thumbImage) ?>" alt="">
        </div>
        <div class="col-sm-6 col-xs-12 home_tip_detail">
            <h3 style="margin-bottom:30px;"><?= $csr->$title ?></h3>
            <p class="light"><?= $csr->$desc ?></p>

            <a href="<?= Yii::$app->UrlManager->createUrl(['site/csrdetail', 'csr_id' => $csr->id]) ?>" class="hover_btn2"><?= Yii::t('app', 'Btn_More') ?></a>
        </div>
    </div>    
    <?php endforeach;?>

    <div class="row align_center" style="padding-bottom: 0;">
        <a href="<?= Yii::$app->urlManager->createUrl(['site/csr'])?>" class="hover_btn"><?= Yii::t('app', 'Btn_All_CSR') ?></a>
    </div>
</div>
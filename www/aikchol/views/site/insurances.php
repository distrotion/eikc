<?php
$this->title = 'AHC';
$image = Yii::$app->language."_image";
?>

<div class="section_main_img" id="insurance_main_img">
    
</div>

<div class="container have_main_img normal_container">
    <div class="row">
        <h1 class="section_name"><?= Yii::t('app', 'Menu_Ins') ?></h1>
    </div>

    <div class="row">
        <ul class="brands_list">
            <?php foreach ($insuranceImages as $insuranceImage) : ?>
            <li class="col-xs12 col-sm-6 col-md-3">
                <img src="<?= str_replace("../aikchol/web/", "./", $insuranceImage->$image) ?>" alt="">
            </li>
            <?php endforeach ?>
        </ul>
        <div class="col-xs-12 align_center2">
            <a href="<?= Yii::$app->urlManager->createUrl(['site/insurance'])?>" class="hover_btn2"><?= Yii::t('app', 'Btn_More') ?></a>
        </div>
    </div>
</div>

<div class="container normal_container" style="padding-top:0;">
    <div class="row">
        <h1 class="section_name"><?= Yii::t('app', 'Menu_Social') ?></h1>
    </div>

    <div class="social_main_img">
            <div class="social_main_detail">
                <div class="social_main_detail_text">
                    <h2><?= Yii::t('app', 'Social_Title') ?></h2>
                    <a href="<?= Yii::$app->urlManager->createUrl(['site/social'])?>" class="hover_btn3"><?= Yii::t('app', 'Btn_More') ?></a>
                </div>
            </div>
    </div>
</div>

<?= $this->render('//layouts/service') ?>
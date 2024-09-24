<?php

/* @var $this yii\web\View */

$this->title = 'AHC';

$title = Yii::$app->language."_title";
$thumbImage = Yii::$app->language."_thumb_image";
$caption = Yii::$app->language."_caption";
$location = Yii::$app->language."_location";
$desc = Yii::$app->language."_desc";
?>

<div class="container" id="home_package">
    <div class="row">
        <h1 class="section_name"><?= Yii::t('app', 'Index_Package') ?></h1>
        <ul class="package_list cleafix col-xs-12">
            <?php foreach ($packages as $package) : ?>
            <li>
                <img src="<?= str_replace("../aikchol/web/", "./", $package->$thumbImage) ?>" alt="">
                <h2><?= $package->$title ?></h2>
                <div class="package_list_detail">
                    <!-- <h2><?= $package->$title ?></h2> -->
                    <p><?= $package->$caption ?></p>
                    <h4><?= Yii::t('app', 'Apply_Location') ?> : <?= Yii::$app->params[$location][$package->location] ?></h4>
                    <a href="<?= Yii::$app->urlManager->createUrl(['site/package', 'id' => $package->id]) ?>" class="hover_btn2"><?= Yii::t('app', 'Btn_More') ?></a>
                </div>
            </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>

<!-- end #home_package -->

<?= $this->render('//layouts/service') ?>

<a href="<?= Yii::$app->urlManager->createUrl(['site/contact']) ?>" class="location" style="background-image:url(images/location_img1.jpg)">
    <div class="location_center">
        <img src="images/location_icon_blue.png" alt="">
        <h3><?= Yii::t('app', 'Btn_Location') ?></h3>
    </div>
</a>

<!-- end .location -->

<div class="container" id="home_tip">
    <div class="row">
        <h1 class="section_name"><?= Yii::t('app', 'Menu_Health') ?></h1>
    </div>
    <?php foreach($tips as $health) : ?>
    <div class="row">
        <div class="col-sm-6 col-xs-12">
            <img src="<?= str_replace("../aikchol/web/", "./", $health->$thumbImage) ?>" alt="">
        </div>
        <div class="col-sm-6 col-xs-12 home_tip_detail">
            <h3><?= $health->$title ?></h3>
            <p class="light">
                <?= $health->$desc ?>
            </p>

            <a href="<?= Yii::$app->urlManager->createUrl(['site/tip', 'tip_id' => $health->id]) ?>" class="hover_btn2"><?= Yii::t('app', 'Btn_More') ?></a>
        </div>
    </div>
    <?php endforeach; ?>

    <div class="row align_center">
        <a href="<?= Yii::$app->urlManager->createUrl(['site/tips']) ?>" class="hover_btn"><?= Yii::t('app', 'Btn_Health') ?></a>
    </div>
</div>

<!-- end #home_tip -->
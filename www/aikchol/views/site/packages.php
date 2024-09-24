<?php
$this->title = 'AHC';

$title = Yii::$app->language."_title";
$thumbImage = Yii::$app->language.'_thumb_image';
$caption = Yii::$app->language."_caption";
$location = Yii::$app->language."_location";

?>

<div class="container" id="home_package">
    <div class="row">
        <h1 class="section_name"><?= Yii::t('app', 'Package_Title') ?></h1>
        <ul class="package_list cleafix col-xs-12">

            <?php foreach ($packages as $package) : ?>
            <li>
                <img src="<?= str_replace("../aikchol/web/", "./", $package->$thumbImage) ?>" alt="">
                <h2><?= $package->$title ?></h2>
                <div class="package_list_detail">
                    <!-- <h2><?= $package->$title ?></h2> -->
                    <p><?= $package->$caption ?></p>
                    <h4><?= Yii::t('app' ,'Apply_Location') ?> : <?= Yii::$app->params[$location][$package->location] ?></h4>
                    <a href="<?= Yii::$app->urlManager->createUrl(['site/package', 'id' => $package->id])?>" class="hover_btn2"><?= Yii::t('app', 'Btn_More') ?></a>
                </div>
            </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>

<?= $this->render('//layouts/service') ?>

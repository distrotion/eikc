<?php
use yii\helpers\Url;
$this->title = 'AHC';
$title = Yii::$app->language."_title";
$image = Yii::$app->language."_image";
$desc = Yii::$app->language."_desc";
$textLeft = Yii::$app->language."_left_text";
$textRight = Yii::$app->language."_right_text";
$location = Yii::$app->language."_location";

?>

<div class="container normal_container">
    <div class="row">
        <div class="col-xs-12">
            <span class="bread_crumb light">
                <a href="<?= Yii::$app->urlManager->createUrl(['site/packages'])?>"><?= Yii::t('app', 'Menu_Packages') ?></a> > <span class="active_page"><?= $package->$title ?></span>
            </span>

            <h3 class="article_name"><?= $package->$title ?></h3>
            <h4 class="package_location"><?= Yii::t('app', 'Apply_Location') ?> : <?= Yii::$app->params[$location][$package->location] ?></h4>

            <p class="artile_main_text">
                <?= $package->$desc ?>
            </p>
            <div class="article_main_img">
                <img src="<?= str_replace("../aikchol/web/", "./", $package->$image) ?>" alt="">
            </div>                    
        </div>

        <div class="col-xs-12 col-md-6 artile_text">
            <p><?= $package->$textLeft ?></p>
        </div>
        <div class="col-xs-12 col-md-6 artile_text">
            <p><?= $package->$textRight ?></p>
        </div>

        <div class="col-xs-12 align_center2">
            <a href="https://www.facebook.com/sharer/sharer.php?p[url]=<?= urlencode(Url::canonical()) ?>" target="_blank" class="hover_btn2"><?= Yii::t('app', 'Btn_Share') ?></a>
        </div>
    </div>
</div>

<?= $this->render("//layouts/service"); ?>
<?php
use yii\helpers\Url;

$this->title = 'AHC';
$title = Yii::$app->language."_title";
$desc = Yii::$app->language."_desc";
$textLeft = Yii::$app->language."_left_text";
$textRight = Yii::$app->language."_right_text";
$image = Yii::$app->language."_image";
?>

<div class="container normal_container">
    <div class="row">
        <div class="col-xs-12">
            <span class="bread_crumb light">
                <a href="<?= Yii::$app->urlManager->createUrl(['site/tips'])?>"><?= Yii::t('app', 'Health_Title') ?></a> > <span class="active_page"><?= $health->$title ?></span>
            </span>

            <h3 class="article_name"><?= $health->$title ?></h3>

            <p class="artile_main_text">
                <?= $health->$desc ?>
            </p>
            <div class="article_main_img">
                <img src="<?= str_replace("../aikchol/web/", "./", $health->$image) ?>" alt="">
            </div>                    
        </div>

        <div class="col-xs-12 col-md-6 artile_text">
                <p><?= $health->$textLeft ?></p>
        </div>
        <div class="col-xs-12 col-md-6 artile_text">
                <p><?= $health->$textRight ?></p>
        </div>

        <div class="col-xs-12 align_center">
            <a href="https://www.facebook.com/sharer/sharer.php?p[url]=<?= urlencode(Url::canonical()) ?>" target="_blank" class="hover_btn2"><?= Yii::t('app', 'Btn_Share') ?></a>
        </div>
    </div>
</div>

<?= $this->render('//layouts/service') ?>
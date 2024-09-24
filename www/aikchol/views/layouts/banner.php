<?php
    $backgroundImage = Yii::$app->language."_image";
    $centerImage = Yii::$app->language."_center_image";
    $title = Yii::$app->language."_title";
    $desc = Yii::$app->language."_desc";
    $linkText = Yii::$app->language."_link_text";
?>
<div id="main_slide_container">
    <div id="main_slide">
        <?php foreach (Yii::$app->controller->banners as $banner) :?>
        <div style="background-image: url(<?= str_replace("../aikchol/web", "./", $banner->$backgroundImage) ?>)">
            <div class="main_slide_content" style="display: none;">
                <img src="images/logo_color.png" alt="">
                <h1><?= $banner->$title ?></h1>
                <p><?= $banner->$desc ?></p>
                <a href="<?= $banner->link ?>" class="hover_btn"><?= $banner->$linkText ?></a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div id="pager"></div>
</div>
<?php
    $title = Yii::$app->language."_title";
    $thumbImage = Yii::$app->language."_thumb_image";
?>

<div class="container" id="home_med">
    <div class="row">
        <h1 class="section_name"><?= Yii::t('app', 'Service_Title') ?></h1>
        <ul class="med_list clearfix">
            <?php foreach (Yii::$app->controller->services as $service) : ?>
                <?php if ($service->show_first == 1) : ?>
            <li>
                <img src="<?= str_replace("../aikchol/web/", "./", $service->$thumbImage) ?>" alt="">
                <h3><?= $service->$title ?></h3>
                <a href="<?= Yii::$app->urlManager->createUrl(['site/service', 'service_id' => $service->id]) ?>" class="hover_btn2">เพิ่มเติม</a>
            </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<!-- end #home_med -->
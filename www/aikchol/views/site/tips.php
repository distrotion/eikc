<?php
$this->title = 'AHC';
$title = Yii::$app->language."_title";
$caption = Yii::$app->language."_caption";
$thumbImage = Yii::$app->language."_thumb_image";
?>

<div class="container" id="tips_container">
    <div class="row">
        <h1 class="section_name"><?= Yii::t('app', 'Health_Title') ?></h1>
        <ul class="tips_list cleafix col-xs-12">
            <?php foreach ($healths as $health) : ?>
            <li>
                <img src="<?= str_replace("../aikchol/web/", "./", $health->$thumbImage) ?>" alt="">
                <h2><?= $health->$title ?></h2>
                <div class="tips_list_detail">
                    <h2><?= $health->$title ?></h2>
                    <p><?= $health->$caption ?></p>
                    <a href="<?= Yii::$app->urlManager->createUrl(['site/tip', 'tip_id' => $health->id])?>" class="hover_btn2"><?= Yii::t('app','Btn_More')?></a>
                </div>
            </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>

<?= $this->render('//layouts/service') ?>

<?php
$this->title = 'AHC';

$title = Yii::$app->language."_title";
$desc = Yii::$app->language."_desc";
$panoramaImage = Yii::$app->language."_panorama_image";
$image = Yii::$app->language."_image";

?>

<div class="container normal_container">
    <div class="row">
        <div class="col-md-3 hidden-xs hidden-sm">
            <h3 class="font16"><?= Yii::t('app', 'Menu_About')?></h3>
            <ul class="sub_cat_list">
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/history'])?>"><?= Yii::t('app', 'Menu_History')?></a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/vision'])?>"><?= Yii::t('app', 'Menu_Vision')?></a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/mission'])?>"><?= Yii::t('app', 'Menu_Mission')?></a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/pride'])?>"><?= Yii::t('app', 'Menu_Pride')?></a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/csr'])?>" class="sub_cat_active"><?= Yii::t('app', 'Menu_CSR')?></a></li>
            </ul>
        </div>
        <div class="col-sm-12 col-md-9">
            <span class="bread_crumb light">
                <a href="<?= Yii::$app->urlManager->createUrl(['site/about'])?>"><?= Yii::t('app', 'Menu_About')?></a> > <span class="active_page"><?= $csr->$title ?></span>
                <a href="" class="sub_nav_btn"><img src="images/sub_nav_btn.jpg" alt=""></a>
                <ul class="section_sub_nav">
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/history'])?>"><?= Yii::t('app', 'Menu_History')?></a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/vision'])?>"><?= Yii::t('app', 'Menu_Vision')?></a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/mission'])?>"><?= Yii::t('app', 'Menu_Mission')?></a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/pride'])?>"><?= Yii::t('app', 'Menu_Pride')?></a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/csr'])?>" class="sub_cat_active"><?= Yii::t('app', 'Menu_CSR')?></a></li>
                </ul>
            </span>

            <h3 class="article_name"><?= $csr->$title ?></h3>

            <p class="artile_main_text">
                <?= $csr->$desc ?>
            </p>
                           
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="article_main_img">
                <img src="<?= str_replace("../aikchol/web/", "./", $csr->$panoramaImage)  ?>" alt="">
            </div>
        </div>

        <?php foreach ($csrImages as $csrImage) : ?>
        <div class="col-xs-12 col-sm-6 artile_text">
            <img src="<?= str_replace("../aikchol/web/", "./", $csrImage->$image) ?>" alt="">    
        </div>        
        <?php endforeach ?>
    </div>

</div>

<?= $this->render('//layouts/service') ?>
<?php
$this->title = 'AHC';
$image = Yii::$app->language."_image";
?>

<div class="container normal_container">
    <div class="row">
        <div class="col-md-3 hidden-xs hidden-sm">
            <h3 class="font16"><?= Yii::t('app', 'Menu_Insurance') ?></h3>
            <ul class="sub_cat_list">
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/insurance'])?>" class="sub_cat_active"><?= Yii::t('app', 'Menu_Ins') ?></a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/social'])?>"><?= Yii::t('app', 'Menu_Social') ?></a></li>
            </ul>
        </div>
        <div class="col-sm-12 col-md-9">
            <span class="bread_crumb light">
                <a href="<?= Yii::$app->urlManager->createUrl(['site/insurances'])?>"><?= Yii::t('app', 'Menu_Insurance') ?></a> > <span class="active_page"><?= Yii::t('app', 'Menu_Ins') ?></span>
                <a href="" class="sub_nav_btn"><img src="images/sub_nav_btn.jpg" alt=""></a>
                <ul class="section_sub_nav">
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/insurance'])?>" class="sub_cat_active"><?= Yii::t('app', 'Menu_Ins') ?></a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/social'])?>"><?= Yii::t('app', 'Menu_Social') ?></a></li>
                </ul>
            </span>

            <h3 class="article_name"><?= Yii::t('app', 'Menu_Ins') ?></h3>

            <p class="artile_main_text">
                <?= $insurance ?>
            </p>                 
        </div>
    </div>

    <div class="row" id="brands_list_container">
        <ul class="brands_list">
            <?php foreach ($insuranceImages as $insuranceImage) : ?>
            <li class="col-xs12 col-sm-6 col-md-3">
                <img src="<?= str_replace("../aikchol/web/", "./", $insuranceImage->$image) ?>" alt="">
            </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>

<?= $this->render('//layouts/service') ?>
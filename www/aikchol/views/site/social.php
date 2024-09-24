<?php
    $this->title = 'AHC';
?>

<div class="container normal_container">
    <div class="row">
        <div class="col-md-3 hidden-xs hidden-sm">
            <h3 class="font16"><?= Yii::t('app', 'Menu_Insurance') ?></h3>
            <ul class="sub_cat_list">
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/insurance'])?>" ><?= Yii::t('app', 'Menu_Ins') ?></a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/social'])?>" class="sub_cat_active"><?= Yii::t('app', 'Menu_Social') ?></a></li>
            </ul>
        </div>
        <div class="col-sm-12 col-md-9">
            <span class="bread_crumb light">
                <a href="<?= Yii::$app->urlManager->createUrl(['site/insurances'])?>"><?= Yii::t('app', 'Menu_Insurance') ?></a> > <span class="active_page"><?= Yii::t('app', 'Menu_Social') ?></span>
                <a href="" class="sub_nav_btn"><img src="images/sub_nav_btn.jpg" alt=""></a>
                <ul class="section_sub_nav">
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/insurance'])?>" ><?= Yii::t('app', 'Menu_Ins') ?></a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/social'])?>" class="sub_cat_active"><?= Yii::t('app', 'Menu_Social') ?></a></li>
                </ul>
            </span>

            <h3 class="article_name"><?= Yii::t('app', 'Social_Title') ?></h3>

            <p class="artile_main_text">
                <?= Yii::t('app', 'Social_Main_Text') ?>
            </p>                 
        </div>
    </div>
    <div class="row" style="display: none;">
        <div class="col-xs-12 col-md-6 artile_text">
            <img src="images/insurance/social/img2.jpg" alt="">
        </div>
        <div class="col-xs-12 col-md-6 artile_text">
            <?= Yii::t('app', 'Social_Sub_Main_Text') ?>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="article_main_img">
                <img src="images/insurance/social/img3.jpg" alt="">
            </div>    
        </div>
        <div class="col-xs-12 col-md-6 artile_text">
            <p><?= Yii::t('app', 'Social_Left_Text') ?></p>
        </div>
        <div class="col-xs-12 col-md-6 artile_text">
            <p><?= Yii::t('app', 'Social_Right_Text') ?></p>
        </div>
    </div>
</div>

<?= $this->render('//layouts/service') ?>
<?php
$this->title = 'AHC';
?>

<div class="container normal_container">
    <div class="row">
        <div class="col-md-3 hidden-xs hidden-sm">
            <h3 class="font16"><?= Yii::t('app', 'Menu_About')?></h3>
            <ul class="sub_cat_list">
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/history'])?>" class="sub_cat_active"><?= Yii::t('app', 'Menu_History')?></a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/vision'])?>"><?= Yii::t('app', 'Menu_Vision')?></a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/mission'])?>"><?= Yii::t('app', 'Menu_Mission')?></a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/pride'])?>"><?= Yii::t('app', 'Menu_Pride')?></a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/csr'])?>"><?= Yii::t('app', 'Menu_CSR')?></a></li>
            </ul>
        </div>
        <div class="col-sm-12 col-md-9">
            <span class="bread_crumb light">
                <a href="<?= Yii::$app->urlManager->createUrl(['site/about'])?>"><?= Yii::t('app', 'Menu_About')?></a> > <span class="active_page"><?= Yii::t('app', 'Menu_History')?></span>
                <a href="" class="sub_nav_btn"><img src="images/sub_nav_btn.jpg" alt=""></a>
                <ul class="section_sub_nav">
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/history'])?>" class="sub_cat_active"><?= Yii::t('app', 'Menu_History')?></a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/vision'])?>"><?= Yii::t('app', 'Menu_Vision')?></a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/mission'])?>"><?= Yii::t('app', 'Menu_Mission')?></a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/pride'])?>"><?= Yii::t('app', 'Menu_Pride')?></a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/csr'])?>"><?= Yii::t('app', 'Menu_CSR')?></a></li>
                </ul>
            </span>

            <h3 class="article_name"><?= Yii::t('app', 'History_Title')?></h3>

            <p class="artile_main_text">
                <?= Yii::t('app', 'History_Desc')?>
            </p>
                           
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="article_main_img">
                <img src="images/about/history/img1.jpg" alt="">
            </div>
        </div>

        <div class="col-xs-12 col-md-6 artile_text">
            <img src="images/about/history/img2.jpg" alt="">
            
        </div>

        <div class="col-xs-12 col-md-6 artile_text">
            <h3><?= Yii::t('app', 'History_Building')?></h3>
            <img src="images/about/history/img_white.jpg" alt="">
        </div>

        <div class="col-xs-12 col-md-6 artile_text" style="float:right">
            <img src="images/about/history/img3.jpg" alt="">
            
        </div>

        <div class="col-xs-12 col-md-6 artile_text" style="float:right">
            <h3><?= Yii::t('app', 'History_Opportunity')?></h3>
            <img src="images/about/history/img_white.jpg" alt="">
        </div>

        <div class="col-xs-12">
            <div class="article_main_img">
                <img src="images/about/history/img4.jpg" alt="">
            </div>
        </div>
    </div>

</div>

<?= $this->render('//layouts/service') ?>
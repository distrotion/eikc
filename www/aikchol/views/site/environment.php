<?php
$this->title = 'AHC';
?>

<div class="container normal_container">
    <div class="row">
        <div class="col-md-3 hidden-xs hidden-sm">
            <h3 class="font16"><?= Yii::t('app', 'Menu_Facilities')?></h3>
            <ul class="sub_cat_list">
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/facilities', 'id' => 0])?>" ><?= Yii::t('app', 'Menu_Room')?></a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/environment'])?>" class="sub_cat_active"><?= Yii::t('app', 'Menu_Environment')?></a></li>
            </ul>
        </div>
        <div class="col-sm-12 col-md-9">
            <span class="bread_crumb light">
                <a href="<?= Yii::$app->urlManager->createUrl(['site/facilities'])?>"><?= Yii::t('app', 'Menu_Facilities')?></a> > <span class="active_page"><?= Yii::t('app', 'Menu_Environment')?></span>
                <a href="" class="sub_nav_btn"><img src="images/sub_nav_btn.jpg" alt=""></a>
                <ul class="section_sub_nav">
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/facilities', 'id' => 0])?>" ><?= Yii::t('app', 'Menu_Room')?></a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/environment'])?>" class="sub_cat_active"><?= Yii::t('app', 'Menu_Environment')?></a></li>
                </ul>
            </span>


            <h3 class="article_name"><?= Yii::t('app', 'Environment_Title') ?></h3>

            <p class="artile_main_text"><?= Yii::t('app', 'Environment_Desc') ?></p>
                           
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="article_main_img">
                <img src="images/facilities/environment.jpg" alt="">
            </div>
        </div>
    </div>

</div>

<?= $this->render("//layouts/service") ?>
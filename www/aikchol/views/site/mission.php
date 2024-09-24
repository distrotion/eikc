<?php
$this->title = 'AHC';
?>

<div class="container normal_container">
    <div class="row">
        <div class="col-md-3 hidden-xs hidden-sm">
            <h3 class="font16"><?= Yii::t('app', 'Menu_About')?></h3>
            <ul class="sub_cat_list">
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/history'])?>"><?= Yii::t('app', 'Menu_History')?></a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/vision'])?>"><?= Yii::t('app', 'Menu_Vision')?></a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/mission'])?>" class="sub_cat_active"><?= Yii::t('app', 'Menu_Mission')?></a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/pride'])?>"><?= Yii::t('app', 'Menu_Pride')?></a></li>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/csr'])?>"><?= Yii::t('app', 'Menu_CSR')?></a></li>
            </ul>
        </div>
        <div class="col-sm-12 col-md-9">
            <span class="bread_crumb light">
                <a href="<?= Yii::$app->urlManager->createUrl(['site/about'])?>"><?= Yii::t('app', 'Menu_About')?></a> > <span class="active_page"><?= Yii::t('app', 'Menu_Mission')?></span>
                <a href="" class="sub_nav_btn"><img src="images/sub_nav_btn.jpg" alt=""></a>
                <ul class="section_sub_nav">
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/history'])?>"><?= Yii::t('app', 'Menu_History')?></a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/vision'])?>"><?= Yii::t('app', 'Menu_Vision')?></a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/mission'])?>" class="sub_cat_active"><?= Yii::t('app', 'Menu_Mission')?></a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/pride'])?>"><?= Yii::t('app', 'Menu_Pride')?></a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/csr'])?>"><?= Yii::t('app', 'Menu_CSR')?></a></li>
                </ul>
            </span>

            <h3 class="article_name"><?= Yii::t('app', 'Mission_Title')?></h3>

            <p class="artile_main_text">
                <?= Yii::t('app', 'Mission_Desc')?>
            </p>
                           
        </div>
    </div>

</div>

<?= $this->render('//layouts/service') ?>
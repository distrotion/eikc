<?php
$this->title = 'AHC';
$title = Yii::$app->language."_title";
?>

<div class="container normal_container">
    <div class="row">
        <div class="col-md-3 hidden-xs hidden-sm">
            <h3 class="font16"><?= Yii::t('app', 'Menu_Careers') ?></h3>
            <ul class="sub_cat_list">
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/positions'])?>" class="sub_cat_active"><?= Yii::t('app', 'Career_Position') ?></a></li>
            </ul>
        </div>
        <div class="col-sm-12 col-md-9">
            <span class="bread_crumb light">
                <a href="<?= Yii::$app->urlManager->createUrl(['site/careers'])?>"><?= Yii::t('app', 'Menu_Careers') ?></a> > <span class="active_page"><?= Yii::t('app', 'Career_Position') ?></span>
                <a href="" class="sub_nav_btn"><img src="images/sub_nav_btn.jpg" alt=""></a>
                <ul class="section_sub_nav">
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/positions'])?>" class="sub_cat_active"><?= Yii::t('app', 'Career_Position') ?></a></li>
                </ul>
            </span>


            <ul id="careers_list">
                <?php foreach ($jobs as $job) : ?>
                <li>
                    <h4><?= $job->$title ?></h4>
                    <a href="<?= Yii::$app->urlManager->createUrl(['site/apply', 'position_id' => $job->id])?>" class="hover_btn2 career_apply_btn"><?= Yii::t('app', 'Btn_Apply') ?></a>
                </li>
                <?php endforeach ?>
            </ul>
                           
        </div>
    </div>

</div>

<?= $this->render('//layouts/service') ?>
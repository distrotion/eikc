<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>

    <?php $this->head() ?>

    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-75644371-1', 'auto');
  ga('send', 'pageview');

    </script>
</head>


<body>
<?php $this->beginBody() ?>

<div id="cover"></div>

<div class="container lang_container" id="<?= Yii::$app->controller->action->id == "index"? 'home_lang' : ''?>">
    <a href="<?= Yii::$app->urlManager->createUrl(['site/index'])?>" class="logo_grey"><img src="images/logo_grey.png" alt=""></a>
    <div class="row clearfix">
        <div class="ver_line"></div>
        <a href="<?= Yii::$app->urlManager->createUrl(['site/language', 'lang' => Yii::$app->language == "th" ? 'en' : 'th'])?>" class="hover_color lang">
            <?= Yii::$app->language == "th" ? 'English' : 'ภาษาไทย' ?>
        </a>
    </div>
</div>

<?php if (Yii::$app->controller->action->id == "index") : ?>
    <?= $this->render('banner'); ?>
<?php endif; ?>

<?php
    $services = ['services', 'doctors', 'service'];
    $packages = ['packages', 'package'];
    $insurances = ['insurances', 'insurance', 'social'];
    $facilities = ['facilities', 'room', 'environment'];
    $about = ['about', 'history', 'vision', 'mission', 'pride', 'csr', 'csrdetail'];
    $careers = ['careers', 'apply', 'position'];

    $listServices = [];
    $title = Yii::$app->language."_title";
    array_push($listServices, array(Yii::$app->urlManager->createUrl(['site/doctors']) => Yii::t('app', 'Menu_Doctor')));
    foreach (Yii::$app->controller->services as $service)
    {
        array_push($listServices, array(Yii::$app->urlManager->createUrl(['site/service', "service_id" => $service->id]) => $service->$title));
    }

?>

<div class="fluid-container main_nav_container hidden-sm hidden-xs" id="home_main_nav">
    <div class="container">
        <div class="row">
            <ul id="main_nav" class="clearfix">
                <li class="<?= Yii::$app->controller->action->id == "index" ? "active" : "" ?>"><a href="<?= Yii::$app->urlManager->createUrl(['site/index'])?>"><?= Yii::t('app', 'Menu_Home') ?></a></li>
                <li class="med_nav <?= in_array(Yii::$app->controller->action->id, $services) ? "active" : "" ?>"><a href="<?= Yii::$app->urlManager->createUrl(['site/services'])?>"><?= Yii::t('app', 'Menu_Service') ?></a>
                    <div class="sub_nav_container container">
                        <div class="row">
			    <?php $count = 0; ?>
                            <?php foreach ($listServices as $index => $service) : ?>
				<?php $count++; ?>
                                <?php if ($index % 7 == 0) : ?>
                                <ul class="col-md-3">
                                <?php endif; ?>
                                <?php foreach ($service as $url => $name) : ?>
                                <li><a href="<?= $url ?>"><?= $name ?></a></li>
                                <?php endforeach; ?>
                                <?php if (($count == 7) || ($index == count($listServices) - 1)) :?>
				<?php $count = 0; ?>
                                </ul>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </li>
                <li class="<?= in_array(Yii::$app->controller->action->id, $packages) ? "active" : "" ?>" ><a href="<?= Yii::$app->urlManager->createUrl(['site/packages'])?>"><?= Yii::t('app', 'Menu_Packages') ?></a></li>
                <li class="<?= in_array(Yii::$app->controller->action->id, $insurances) ? "active" : "" ?>" ><a href="<?= Yii::$app->urlManager->createUrl(['site/insurances'])?>"><?= Yii::t('app', 'Menu_Insurance') ?></a></li>
                <li class="<?= in_array(Yii::$app->controller->action->id, $facilities) ? "active" : "" ?>" ><a href="<?= Yii::$app->urlManager->createUrl(['site/facilities'])?>"><?= Yii::t('app', 'Menu_Facilities') ?></a></li>
                <li class="<?= in_array(Yii::$app->controller->action->id, $about) ? "active" : "" ?>" ><a href="<?= Yii::$app->urlManager->createUrl(['site/about'])?>"><?= Yii::t('app', 'Menu_About') ?></a></li>
                <li class="<?= in_array(Yii::$app->controller->action->id, $careers) ? "active" : "" ?>" ><a href="<?= Yii::$app->urlManager->createUrl(['site/careers'])?>"><?= Yii::t('app', 'Menu_Careers') ?></a></li>
                <li class="<?= Yii::$app->controller->action->id == "contact" ? "active" : "" ?>"><a href="<?= Yii::$app->urlManager->createUrl(['site/contact'])?>"><?= Yii::t('app', 'Menu_Contact') ?></a></li>
            </ul>
        </div>
    </div>
</div>

<!-- end #main_nav_container -->

<div class="mobile_nav_whole">
    <div class="fluid-container mobile_nav_container hidden-lg hidden-md" id="home_mobile_nav">
        <div class="row">
            <div class="col-xs-12 clearfix">
                <a href="<?= Yii::$app->urlManager->createUrl(['site/index'])?>" class="mobile_logo"><img src="images/logo.png" alt=""></a>
                <div class="mobile_btn">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>

    <ul class="mobile_nav">
        <li><a href="<?= Yii::$app->urlManager->createUrl(['site/index'])?>"><?= Yii::t('app', 'Menu_Home') ?></a></li>
        <li class="mobile_med_nav"><a href="<?= Yii::$app->urlManager->createUrl(['site/services'])?>"><?= Yii::t('app', 'Menu_Service') ?></a>
            <ul class="mobile_sub_nav">
                <?php foreach ($listServices as $service) : ?>
                    <?php foreach ($service as $url => $name) : ?>
                    <li><a href="<?= $url ?>"><?= $name ?></a></li>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </ul>
        </li>
        <li><a href="<?= Yii::$app->urlManager->createUrl(['site/packages'])?>"><?= Yii::t('app', 'Menu_Packages') ?></a></li>
        <li><a href="<?= Yii::$app->urlManager->createUrl(['site/insurances'])?>"><?= Yii::t('app', 'Menu_Insurance') ?></a></li>
        <li><a href="<?= Yii::$app->urlManager->createUrl(['site/facilities'])?>"><?= Yii::t('app', 'Menu_Facilities') ?></a></li>
        <li><a href="<?= Yii::$app->urlManager->createUrl(['site/about'])?>"><?= Yii::t('app', 'Menu_About') ?></a></li>
        <li><a href="<?= Yii::$app->urlManager->createUrl(['site/careers'])?>"><?= Yii::t('app', 'Menu_Careers') ?></a></li>
        <li><a href="<?= Yii::$app->urlManager->createUrl(['site/contact'])?>"><?= Yii::t('app', 'Menu_Contact') ?></a></li>
    </ul>
</div>
<!-- end .mobile_nav_container -->

<?= $content ?>

<div class="container" id="news_letter_container">
    <div class="row">
        <h1 class="section_name"><?= Yii::t('app','Email_Recieve') ?></h1>
    </div>
    <div class="row">
        <form method="post" action="<?= Yii::$app->urlManager->createUrl(['site/subscribe']) ?>" class="news_letter_form col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
            <input type="email" class="news_letter_box light" name="email" placeholder="<?= Yii::t('app','Email_Insert') ?>" required>
            <input type="hidden" name="url" value="<?= Url::canonical() ?>">
            <div style="text-align:center;">
                <label for="email" class="error"></label>
            </div>
            <input type="submit" value="<?= Yii::t('app','Btn_Submit') ?>" class="hover_btn submit_email">
        </form>
    </div>
</div>

<!-- end #news_letter_container -->

<div id="to_top_container" class="container-fluid">
    <div class="container">
        <div class="row">
            <a href="" class="to_top_btn">
                <img src="images/to_top_btn.png" alt="">
            </a>
        </div>
    </div>
</div>

<footer>
    <div class="container-fluid footer_top">
        <div class="container">
            <div class="row">
		<?php $count = 0; ?>
                <?php foreach ($listServices as $index => $service) : ?>
		    <?php $count++; ?>
                    <?php if ($index % 13 == 0) : ?>
                        <section class="col-md-3 hidden-xs hidden-sm">
                       	    <?php if ($index == 0): ?>
                            <h4><?= Yii::t('app', 'Menu_Service') ?></h4>
                            <?php endif; ?>
                            <ul class="footer_list">
                    <?php endif; ?>

                    <?php foreach ($service as $url => $name) : ?>
                            <li><a href="<?= $url?>"><?= $name ?></a></li>
                    <?php endforeach; ?>
                    <?php if (($count == 13) || ($index == count($listServices) - 1)) : ?>
		    <?php $count = 0; ?>
                            </ul>
                        </section>
                    <?php endif; ?>
                <?php endforeach ?>

                <section class="col-md-3 hidden-xs hidden-sm">
                    <h4><?= Yii::t('app', 'Menu_Insurance') ?></h4>
                    <ul class="footer_list">
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['site/insurance'])?>"><?= Yii::t('app', 'Menu_Ins') ?></a></li>
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['site/social'])?>"><?= Yii::t('app', 'Menu_Social') ?></a></li>
                    </ul>

                    <h4><?= Yii::t('app', 'Menu_Facilities') ?></h4>
                    <ul class="footer_list">
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['site/facilities'])?>"><?= Yii::t('app', 'Menu_Room') ?></a></li>
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['site/environment'])?>"><?= Yii::t('app', 'Menu_Environment') ?></a></li>
                    </ul>

                    <h4><?= Yii::t('app', 'Menu_About') ?></h4>
                    <ul class="footer_list">
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['site/history'])?>"><?= Yii::t('app', 'Menu_History') ?></a></li>
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['site/vision'])?>"><?= Yii::t('app', 'Menu_Vision') ?></a></li>
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['site/mission'])?>"><?= Yii::t('app', 'Menu_Mission') ?></a></li>
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['site/pride'])?>"><?= Yii::t('app', 'Menu_Pride') ?></a></li>
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['site/csr'])?>"><?= Yii::t('app', 'Menu_CSR') ?></a></li>
                    </ul>
                </section>
                <section class="col-md-3 col-sm-12" id="footer_last_col">
                    <ul class="footer_nav">
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['site/packages'])?>"><?= Yii::t('app', 'Menu_Packages') ?></a></li>
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['site/tips'])?>"><?= Yii::t('app', 'Menu_Health') ?></a> </li>
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['site/careers'])?>"><?= Yii::t('app', 'Menu_Careers') ?></a></li>
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['site/contact'])?>"><?= Yii::t('app', 'Menu_Contact') ?></a></li>
                        <li><a target="_blank" href="http://ir.aikchol.com/index.php/<?= strtolower(Yii::$app->language) ?>/"><?= Yii::t('app', 'Menu_IR') ?></a></li>
                    </ul>

                    <div class="footer_contact">
                        <br>
                        <h2><?= Yii::t('app', 'Hospital_Name') ?></h2>
                        <?= Yii::t('app', 'Hospital_Address') ?><br>
                        <?= Yii::t('app', 'Telephone') ?> : 038 939 999<br>
                        <br>

                        <h2><?= Yii::t('app', 'Hospital_Name2') ?></h2>
                        <?= Yii::t('app', 'Hospital_Address2') ?><br>
                        <?= Yii::t('app', 'Telephone') ?> : 038 939 888<br>
                        <br>

                        <span>

                        <?= Yii::t('app', 'Email') ?> : <a href="mailto:info@aikchol.com">info@aikchol.com</a>
                        </span>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="container-fluid footer_middle">
        <div class="container">
            <div class="row">
                <section class="col-md-4 hidden-xs hidden-sm light">
                    Copyright &copy; 2015 Aikchol Hospital <br>
All rights reserved. Designed by <a href="http://suffix.works" target="_blank">SUFFIX</a>
                </section>
                <section class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-12">
                    <ul class="social_list clearfix">
                        <li>
                            <a href="https://www.facebook.com/Aikcholhospital" target="_blank"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/channel/UCcaKbwwK3IBoxgDyXRiWQLA" target="_blank"><i class="fa fa-youtube"></i></a>
                        </li>
                        <li>
                            <a href="https://plus.google.com/113215790488667528944/about" target="_blank"><i class="fa fa-google-plus"></i></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/Aikcholhospital" target="_blank"><i class="fa fa-twitter"></i></a>
                        </li>
                    </ul>
                </section>
                <section class="col-md-3 col-md-offset-1 hidden-xs hidden-sm">
                    <span style="display:inline-block; max-width:192px;"><img src="images/footer_logo.jpg" alt="" class="img-responsive"></span>

                    <a href="<?= Yii::$app->urlManager->createUrl(['site/pride'])?>" style="display: inline-block; width:45px; vertical-align:bottom; margin-left: 10px;"><img src="images/goldseal.png" alt="" class="img-responsive"></a>
                </section>
            </div>
        </div>
    </div>

    <div class="container-fluid footer_bottom hidden-lg hidden-md">
        <div class="container">
            <div class="row light">
                Copyright &copy; 2015 Aikchol Hospital <br>
                All rights reserved. Designed by <a href="http://suffix.works" target="_blank">SUFFIX</a>
            </div>
        </div>
    </div>

</footer>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-75644371-1', 'auto');
  ga('send', 'pageview');

</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<?php
$this->title = 'AHC';

$title = Yii::$app->language."_title";
$desc = Yii::$app->language."_desc";
$subDesc = Yii::$app->language."_sub_desc";
$textLeft = Yii::$app->language."_left_text";
$textRight = Yii::$app->language."_right_text";
$address = Yii::$app->language."_address";
$panoramaImage = Yii::$app->language."_panorama_image";
$image = Yii::$app->language."_image";
$location = Yii::$app->language."_location";
?>

<div class="container normal_container">
    <div class="row">
        <div class="col-md-3 hidden-xs hidden-sm">
            <h3 class="font16"><?= Yii::t('app', 'Menu_Service') ?></h3>
            <ul class="sub_cat_list">
                <li><a href="<?= Yii::$app->urlManager->createUrl('site/doctors') ?>" ><?= Yii::t('app', 'Menu_Doctor') ?></a></li>
                <?php foreach (Yii::$app->controller->services as $data) : ?>
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/service', 'service_id' => $data->id]) ?>" class="<?= $data->id == $serviceId ? "sub_cat_active" : "" ?>"><?= $data->$title?></a></li>
                <?php endforeach; ?>    
            </ul>
        </div>
        <div class="col-sm-12 col-md-9">
            <span class="bread_crumb light">
                <a href="<?= Yii::$app->urlManager->createUrl('site/services') ?>"><?= Yii::t('app', 'Menu_Service') ?></a> > <span class="active_page"><?= $service->$title?></span>
                <a href="" class="sub_nav_btn"><img src="images/sub_nav_btn.jpg" alt=""></a>
                <ul class="section_sub_nav">
                    <li><a href="<?= Yii::$app->urlManager->createUrl('site/doctors') ?>" ><?= Yii::t('app', 'Menu_Doctor') ?></a></li>
                    <?php foreach (Yii::$app->controller->services as $data) : ?>
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['site/service', 'service_id' => $data->id]) ?>" class="<?= $data->id == $serviceId ? "sub_cat_active" : "" ?>"><?= $data->$title?></a></li>
                    <?php endforeach; ?>    
                </ul>
            </span>

            <h3 class="article_name"><?= $service->$title ?></h3>
            <h4 class="package_location"><?= Yii::t('app', 'Apply_Location')?> : <?= Yii::$app->params[$location][$service->location] ?></h4>

            <p class="artile_main_text">
                <?= $service->$desc ?>
            </p>
            <div class="article_main_img">
                <img src="<?= str_replace("../aikchol/web/", "./", $service->$image) ?>" alt="">
            </div>                    
        </div>
    </div>

    <div class="row">
            <div class="col-sm-12 artile_text">
                <p>
                    <?= $service->$subDesc ?>
                </p>
                <div class="article_main_img">
                    <img src="<?= str_replace("../aikchol/web/", "./", $service->$panoramaImage) ?>" alt="">
                </div>    
            </div>
            <div class="col-xs-12 col-md-6 artile_text">
                    <p><?= $service->$textLeft ?></p>
            </div>
            <div class="col-xs-12 col-md-6 artile_text">
                    <p><?= $service->$textRight ?></p>
            </div>
        </div>

</div>

<div class="container normal_container">
    <div class="row">
        <div class="col-xs-12 align_center2" style="padding-top:0;">
            <p class="appointment_text"><?= $service->$address ?></p>
            <!--a href="" class="appointment hover_btn appointment_btn"><?= Yii::t('app', 'Btn_Appointment') ?></a-->
        </div>
    </div>
</div>

<?= $this->render('//layouts/service') ?>

<?= $this->render('appointment') ?>

<script type="text/javascript">
    $(document).ready(function() {
        $("#select_specialty").empty().append('<option selected="selected" value="<?= $service->id ?>"><?= Yii::t('app', 'Doctor_Specialty') ?> : <?= $service->$title ?></option>');
        <?php foreach ($doctors as $doctor) : ?>
        $("#select_doctor").append('<option value="<?= $doctor->id ?>"><?= Yii::t('app', 'Appointment_Doctor') ?> : <?= $doctor->$title ?></option>');
        <?php endforeach; ?>
        $(".appointment").on('click', function() {
            $('#select_doctor').val('');
            $('input[type=text]').show();
            $('input[type=email]').show();
            $('input[type=submit]').show();
            $('textarea').show();
            $('select').show();
            $(".appointment_field").show();
            $("#thankyou_appointment_container").hide();
        })
    })
</script>

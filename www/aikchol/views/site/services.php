<?php
$this->title = 'AHC';
$title = Yii::$app->language."_title";
$thumbImage = Yii::$app->language."_thumb_image";
$image = Yii::$app->language."_image";
$location = Yii::$app->language."_location";

$serviceMap = [];

foreach ($services as $service) 
{
    $serviceMap[$service->id] = $service->$title;
}
?>

<div class="section_main_img" id="med_main_img">
            
</div>

<div class="container have_main_img normal_container">
    <div class="row">
        <h1 class="section_name"><?= Yii::t('app', 'Menu_Doctor')?></h1>
    </div>

    <div class="row">
        <ul class="doctor_list">
            <?php foreach ($doctors as $doctor) : ?>
            <li class="col-xs12 col-sm-6 col-md-3">
                <div class="doctor_thumb">
                    <img src="<?= str_replace("../aikchol/web/", "./", $doctor->$image) ?>" alt="">
                    <!--div class="make_appointment_container">
                        <a data-id="<?= $doctor->id ?>" data-sid="<?= $doctor->service_id ?>" href="" class="appointment hover_btn2"><?= Yii::t('app', 'Btn_Appointment')?></a>
                    </div-->
                </div>
                <h3><?= $serviceMap[$doctor->service_id] ?></h3>
                <h4 class="light"><?= $doctor->$title ?></h4>
                <h5 class="light"><?= Yii::$app->params[$location][$doctor->location] ?></h5>
            </li>
            <?php endforeach; ?>
        </ul>
        <div class="col-xs-12 align_center2">
            <a href="<?= Yii::$app->urlManager->createUrl(['site/doctors'])?>" class="hover_btn2"><?= Yii::t('app', 'Btn_More')?></a>
        </div>
    </div>
</div>

<div class="container" id="home_med">
    <div class="row">
        <h1 class="section_name"><?= Yii::t('app', 'Menu_Service')?></h1>
        <ul class="med_list clearfix">
            <?php foreach ($services as $service) : ?>
            <li>
                <img src="<?= str_replace("../aikchol/web/", "./", $service->$thumbImage) ?>" alt="">
                <h3><?= $service->$title ?></h3>
                <a href="<?= Yii::$app->urlManager->createUrl(['site/service', "service_id" => $service->id])?>" class="hover_btn2"><?= Yii::t('app', 'Btn_More')?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>


<?= "";//$this->render('appointment') ?>

<script type="text/javascript">
    $(document).ready(function() {
        var mapDoctor = [];
        <?php foreach ($doctors as $doctor) : ?>
        mapDoctor[<?= $doctor->id ?>] = '<?= $doctor->$title ?>';
        <?php endforeach; ?>
        var mapService = [];
        <?php foreach (Yii::$app->controller->services as $service) : ?>
        mapService[<?= $service->id ?>] = '<?= $service->$title ?>';
        <?php endforeach ?>
        
        $(".appointment").on('click', function() {
            $("#thankyou_appointment_container").hide();
            $('input[type=text]').show();
            $('input[type=email]').show();
            $('input[type=submit]').show();
            $('textarea').show();
            $('select').show();
            $(".appointment_field").show();
            var doctorId = $(this).data("id");
            var serviceId = $(this).data("sid");
            $("#select_specialty").empty().append('<option selected="selected" value="' + serviceId + '"><?= Yii::t('app', 'Doctor_Specialty') ?> : ' + mapService[serviceId] + '</option>');
            $("#select_doctor").empty().append('<option selected="selected" value="' + doctorId + '"><?= Yii::t('app', 'Appointment_Doctor') ?> : ' + mapDoctor[doctorId] + '</option>');
        })
    })

</script>
<?php
use yii\helpers\Url;

$this->title = 'AHC';

$title = Yii::$app->language."_title";
$image = Yii::$app->language."_image";
$location = Yii::$app->language."_location";

$serviceMap = [];

foreach (Yii::$app->controller->services as $service) 
{
    $serviceMap[$service->id] = $service->$title;
}

?>

<div class="container normal_container">
    <div class="row">
        <div class="col-md-3 hidden-xs hidden-sm">
            <h3 class="font16"><?= Yii::t('app', 'Menu_Service') ?></h3>
            <ul class="sub_cat_list">
                <li><a href="<?= Yii::$app->urlManager->createUrl('site/doctors') ?>" class="sub_cat_active"><?= Yii::t('app', 'Menu_Doctor') ?></a></li>
                <?php foreach (Yii::$app->controller->services as $service) : ?>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/service', 'service_id' => $service->id]) ?>"><?= $service->$title ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-sm-12 col-md-9 content_doctor">
            <div class="bg_content_doctor">
                <img src="images/bg_doctor_page.jpg">
            </div>
            <span class="bread_crumb light">
                <a href="<?= Yii::$app->urlManager->createUrl('site/services') ?>"><?= Yii::t('app', 'Menu_Service') ?></a> > <span class="active_page"><?= Yii::t('app', 'Menu_Doctor') ?> </span> > <span class="active_page"><?= Yii::t('app', 'Data_Doctor') ?> </span>
                <a href="" class="sub_nav_btn">
                    <img src="images/sub_nav_btn.jpg" alt="">
                </a>
                <ul class="section_sub_nav">
                    <li><a href="<?= Yii::$app->urlManager->createUrl('site/doctors') ?>" class="sub_cat_active"><?= Yii::t('app', 'Menu_Doctor') ?></a></li>
                    <?php foreach (Yii::$app->controller->services as $service) : ?>
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['site/service', 'service_id' => $service->id]) ?>"><?= $service->$title ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </span>

            <h3 class="article_name"><?= Yii::t('app', 'Menu_Doctor') ?></h3>

            <p class="artile_main_text">
                <?= Yii::t('app', 'Doctor_Desc') ?>
            </p>
            <div class="article_main_img">
                <img src="images/med/doctor/img1.jpg" alt="">
            </div>                    
        </div>
    </div>

    <div class="row filter_doctor">
        <div class="col-sm-12 col-md-6">
            <form method="post" action="<?= Yii::$app->urlManager->createUrl(['site/doctors']) ?>" class="search_doctor_form">
                <input type="text" value="<?= Yii::$app->request->post('name') ?>" name="name" class="appointment_box" placeholder="<?= Yii::t('app', 'Doctor_Search') ?>" required>
                <input type="submit" value="FIND" class="hover_btn2">
                <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken(); ?>">
            </form>      
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3">
            <select id="specialty" name="specialty" class="form-control select_box" required>
                <option value="" selected><?= Yii::t('app', 'Doctor_Specialty') ?> : <?= Yii::t('app', 'All') ?></option>
                <?php foreach (Yii::$app->controller->services as $service) : ?>
                    <option value="<?= $service->id ?>"><?= Yii::t('app', 'Doctor_Specialty') ?> : <?= $service->$title ?></option>
                <?php endforeach; ?>
            </select>  
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <select id="location" name="location" class="form-control select_box" required>
                <option value=""><?= Yii::t('app', 'Apply_Location') ?> : <?= Yii::t('app', 'Select') ?></option>
                <?php for ($i = 0; $i < 2; $i++): ?>
                    <option value="<?= $i ?>"><?= Yii::t('app', 'Apply_Location') ?> : <?= Yii::$app->params[$location][$i] ?></option>    
                <?php endfor; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <ul class="doctor_list">
            <?php foreach ($doctors as $doctor) : ?>
            <li data-lid="<?= $doctor->location ?>" data-sid="<?= $doctor->service_id ?>" class="doctor col-xs-6 col-sm-3 col-md-3">
                <a href="<?= Url::to(['doctor-detail', 'id' => $doctor->id]) ?>">
                    <div class="doctor_thumb doctor_thumb_b">
                        <img src="<?= str_replace("../aikchol/web/", "./", $doctor->$image) ?>" alt="">
                        <div class="box_doctor_hover">
                            <a href="<?= Url::to(['doctor-detail', 'id' => $doctor->id]) ?>">
                                <button class="btn_a_doctor_hover">เพิ่มเติม</button>
                            </a>
                        </div>
                    </div>
                </a>
                <h3 class="h3_doctor_list"><a href="<?= Url::to(['doctor-detail', 'id' => $doctor->id]) ?>"><?= $serviceMap[$doctor->service_id] ?></a></h3>
                <h4 class="light h4_doctor_list"><a href="<?= Url::to(['doctor-detail', 'id' => $doctor->id]) ?>"><?= $doctor->$title ?></a></h4>
                <h5 class="light h5_doctor_list"><a href="<?= Url::to(['doctor-detail', 'id' => $doctor->id]) ?>"><?= Yii::$app->params[$location][$doctor->location] ?></a></h5>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>        

<?= $this->render('//layouts/service') ?>

<?= $this->render('appointment') ?>

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

        $("#specialty").on("change", function() {
            var specialId = $(this).val();

            if (specialId != "")
            {
                $("li.doctor").each(function(index) {
                    if ($(this).data("sid") != specialId)
                    {
                        $(this).hide();
                    }
                    else
                    {
                        $(this).show();
                    }
                })    
            }
            else
            {
                $("li.doctor").show();
            }
        })

        $("#location").on("change", function() {
            var locationId = $(this).val();
            if (locationId != "")
            {
                $("li.doctor").each(function(index) {
                    if ($(this).data("lid") != locationId)
                    {
                        $(this).hide();
                    }
                    else
                    {
                        $(this).show();
                    }
                })
            }
            else
            {
                $("li.doctor").show();
            }
        })
    })
</script>
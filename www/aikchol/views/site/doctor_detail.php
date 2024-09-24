<?php
use yii\helpers\Url;

$this->title = 'AHC';

$title = Yii::$app->language . "_title";
$image = Yii::$app->language . "_image";
$location = Yii::$app->language . "_location";
$information_year = "information_year_" . Yii::$app->language;
$information = "information_" . Yii::$app->language;
$specialized_training_year = "specialized_training_year_" . Yii::$app->language;
$specialized_training = "specialized_training_" . Yii::$app->language;
$image_schedule = "image_schedule_" . Yii::$app->language;

$serviceMap = [];

foreach (Yii::$app->controller->services as $service) {
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
        <div class="col-sm-12 col-md-9">
            <span class="bread_crumb light">
                <a href="<?= Yii::$app->urlManager->createUrl('site/services') ?>">
                    <?= Yii::t('app', 'Menu_Service') ?>
                </a> > <?= Yii::t('app', 'Menu_Doctor') ?> > <span class="active_page"><?= Yii::t('app', 'Data_Doctor') ?></span>
                <a href="" class="sub_nav_btn"><img src="images/sub_nav_btn.jpg" alt=""></a>
                <ul class="section_sub_nav">
                    <li><a href="<?= Yii::$app->urlManager->createUrl('site/doctors') ?>" class="sub_cat_active"><?= Yii::t('app', 'Menu_Doctor') ?></a></li>
                    <?php foreach (Yii::$app->controller->services as $service) : ?>
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['site/service', 'service_id' => $service->id]) ?>"><?= $service->$title ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </span>

            <h3 class="article_name"><?= Yii::t('app', 'Data_Doctor') ?></h3>

            <div class="row">
                <div class="col-xs-offset-1 col-xs-8 col-sm-offset-0 col-sm-5 col-md-4 wrap_content_detail_doctor_l">
                    <div class="col-xs-12 wrap_image_doctor">
                        <img src="<?= str_replace("../aikchol/web/", "./", $doctor->$image) ?>" alt="doctor">
                    </div>
                </div>
                <div class="col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-7 col-md-8 wrap_content_detail_doctor_r">
                    <div class="col-md-12 wrap_top_detail_doctor">
                        <h1><?= $doctor->$title ?></h1>
                        <h4 class="h4_doctor_detail">สาขาความชำนาญ/แผนก : <?= $serviceMap[$doctor->service_id] ?> </h4>
                        <h5>โรงพยาบาลที่ออกตรวจ : <?= Yii::$app->params[$location][$doctor->location] ?></h5>
                        <div class="wrapper_btn_detail_doctor">
                            <a class="a_btn_detail_doctor" target="_blank" href="https://line.me/R/ti/p/<?= $doctor->line ?>">
                                <button class="btn_detail_doctor" type="button">
                                    <img src="images/line_add.svg">
                                </button>
                            </a>
                            <a class="a_btn_detail_doctor" href="tel:+<?=  preg_replace('/^0?/', '+66', $doctor->mobile)?>">
                                <button class="btn_detail_doctor" type="">
                                    <i class="fa fa-phone"></i> <?= $doctor->mobile ?>
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-12 wrap_detail_table_doctor">
                        <h3><img class="icon_data_doctor" src="images/icon_data_doctor.svg">ข้อมูลแพทย์</h3>
                        <?php foreach ($doctorDescription as $detial) { ?>
                            <div class="row wrap_table_a">
                                <div class="col-md-1 wrap_table_in_a">
                                    <h3 class="h3_table_doctor"><?= $detial->$information_year ?></h3>
                                </div>
                                <div class="col-md-11 wrap_table_in_b">
                                    <p class="p_table_doctor">
                                        <?= $detial->$information ?>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>

                        <h3 class="h3_sub_title_detail">แขนงที่ฝึกฝนเป็นพิเศษ</h3>
                        <?php foreach ($doctorDescription as $detial) { ?>
                        <div class="row wrap_table_a">
                            <div class="col-md-1 wrap_table_in_a">
                                <h3 class="h3_table_doctor"><?= $detial->$specialized_training_year ?></h3>
                            </div>
                            <div class="col-md-11 wrap_table_in_b">
                                <p class="p_table_doctor">
                                    <?= $detial->$specialized_training ?>
                                </p>
                            </div>
                        </div>
                        <?php } ?>

                        <h3 class="h3_detail_doctor_margin"><img class="icon_data_doctor" src="images/icon_calendar.svg">ตารางออกตรวจ</h3>
                        <div class="row wrap_table_a">
                            <div class="col-md-12 wrap_calendar">
                                <img src="<?= str_replace("../aikchol/web/", "./", $doctor->$image_schedule) ?>">
                            </div>
                            <div class="col-md-12 wrap_table_in_c">
                                <p class="sub_text_detail">*หมายเหตุ ติดต่อสอบถามก่อนเข้ารับบริการ เนื่องจากข้อมูลตารางออกตรวจเเพทย์อาจมีการเปลี่ยนแปลง</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- wrap_content_detail_doctor_r -->
            </div>
            <div class="col-md-12 wrap_doctor_sub">
                <div class="row">
                    <h4 class="h4_top_marg">
                        แพทย์ที่เกี่ยวข้อง
                        <a href="<?= Url::to(['doctor']) ?>" class="view_all_doctor">ทั้งหมด</a>
                    </h4>
                    <ul class="doctor_list doctor_list_b">
                        <?php foreach ($doctor_relations as $doctor_relation) { ?>
                        <li data-lid="<?= $doctor_relation->location ?>" data-sid="<?= $doctor_relation->service_id ?>" class="doctor col-xs-6 col-sm-3 col-md-3 li_doctor_b">
                            <a href="<?= Url::to(['doctor-detail', 'id' => $doctor_relation->id]) ?>"></a>
                            <div class="doctor_thumb doctor_thumb_b">
                                <a href="<?= Url::to(['doctor-detail', 'id' => $doctor_relation->id]) ?>">
                                    <img src="<?= str_replace("../aikchol/web/", "./", $doctor_relation->$image) ?>" alt="">
                                </a>
                                <div class="box_doctor_hover">
                                    <a href="<?= Url::to(['doctor-detail', 'id' => $doctor_relation->id]) ?>"></a>
                                    <a href="<?= Url::to(['doctor-detail', 'id' => $doctor_relation->id]) ?>">
                                        <button class="btn_a_doctor_hover">เพิ่มเติม</button>
                                    </a>
                                </div>
                                <!--div class="make_appointment_container">
                                <a data-id="144" data-sid="5" href="" class="appointment hover_btn2">นัดหมาย</a>
                            </div-->
                            </div>
                            <h3 class="h3_doctor_list">
                                <a href="<?= Url::to(['doctor-detail', 'id' => $doctor_relation->id]) ?>"><?= $serviceMap[$doctor_relation->service_id] ?></a>
                            </h3>
                            <h4 class="light h4_doctor_list">
                                <a href="<?= Url::to(['doctor-detail', 'id' => $doctor_relation->id]) ?>"><?= $doctor_relation->$title ?></a>
                            </h4>
                            <h5 class="light h5_doctor_list">
                                <a href="<?= Url::to(['doctor-detail', 'id' => $doctor_relation->id]) ?>"><?= Yii::$app->params[$location][$doctor_relation->location] ?></a>
                            </h5>
                        </li>
                        <?php } ?>
                    </ul>
                    <a href="<?= Url::to(['doctor']) ?>" class="view_all_doctor_b">ทั้งหมด</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->title = 'AHC';
$title = Yii::$app->language."_title";
$functional = Yii::$app->language."_functional";
$qualification = Yii::$app->language."_qualification";
$location = Yii::$app->language."_location";
$gender = Yii::$app->language."_gender";
$province = Yii::$app->language."_province";
?>

<div class="container normal_container">
    <div class="row">
        <div class="col-md-3 hidden-xs hidden-sm">
            <h3 class="font16"><?= Yii::t('app', 'Menu_Careers')?></h3>
            <ul class="sub_cat_list">
                <li><a href="<?= Yii::$app->urlManager->createUrl(['site/positions'])?>" class="sub_cat_active"><?= Yii::t('app', 'Career_Position')?></a></li>
            </ul>
        </div>
        <div class="col-sm-12 col-md-9">
            <span class="bread_crumb light">
                <a href="<?= Yii::$app->urlManager->createUrl(['site/careers'])?>"><?= Yii::t('app', 'Menu_Careers')?></a> > <span class="active_page"><?= Yii::t('app', 'Career_Position')?></span>
                <a href="" class="sub_nav_btn"><img src="images/sub_nav_btn.jpg" alt=""></a>
                <ul class="section_sub_nav">
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/positions'])?>" class="sub_cat_active"><?= Yii::t('app', 'Career_Position')?></a></li>
                </ul>
            </span>

            <h3 class="article_name"><?= $job->$title?></h3>
            <h4 class="package_location"><?= Yii::t('app', 'Apply_Location') ?> : <?= Yii::$app->params[$location][$job->location] ?></h4>

            <div class="career_detail light">
                <h3><?= Yii::t('app', 'Apply_Function') ?></h3>
                <p><?= $job->$functional?></p>
            </div>

            <div class="career_detail light">
                <h3><?= Yii::t('app', 'Apply_Qualification') ?></h3>
                <p><?= $job->$qualification?></p>
            </div>
        
        </div>
    </div>

</div>

<div class="container normal_container">
    <div class="row">
        <div class="col-xs-12 col-md-9 col-md-offset-3">
            <form method="post" action="<?= Yii::$app->urlManager->createUrl(["site/apply", 'position_id' => Yii::$app->getRequest()->getQueryParam('position_id')]) ?>" class="row apply_form">
                <div class="col-xs-12 col-sm-6 career_field">
                    <select name="position" class="form-control select_box" required>
                        <option value="<?= $job->id ?>"><?= Yii::t('app', 'Apply_Form_Position') ?> : <?= $job->$title?></option>
                    </select>                        
                </div>

                <div class="col-xs-12 col-sm-6 career_field">
                    <input type="text" class="appointment_box" name="salary" placeholder="<?= Yii::t('app', 'Career_Form_Salary') ?>" value="<?= isset($_REQUEST['salary']) ? $_REQUEST['salary'] : '' ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <select name="gender" class="form-control select_box">
                        <option value=""><?= Yii::t('app', 'Apply_Form_Gender') ?> : <?= Yii::t('app', 'Select') ?></option>
                        <?php foreach (Yii::$app->params[$gender] as $index => $data) : ?>
                        <option value="<?= $index ?>"><?= Yii::t('app', 'Apply_Form_Gender') ?> : <?= $data ?></option>
                        <?php endforeach; ?>
                    </select>                        
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="name" value="<?= isset($_REQUEST['name']) ? $_REQUEST['name'] : '' ?>" placeholder="<?= Yii::t('app', 'Career_Form_Name') ?> *" required>
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="last_name" value="<?= isset($_REQUEST['last_name']) ? $_REQUEST['last_name'] : '' ?>" placeholder="<?= Yii::t('app', 'Career_Form_Lastname') ?> *" required>
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="dob" placeholder="<?= Yii::t('app', 'Apply_Form_BirthDate') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="weight" placeholder="<?= Yii::t('app', 'Apply_Form_Weight') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="height" placeholder="<?= Yii::t('app', 'Apply_Form_Height') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="race" placeholder="<?= Yii::t('app', 'Apply_Form_Race') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="nationality" placeholder="<?= Yii::t('app', 'Apply_Form_Nationality') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="religeion" placeholder="<?= Yii::t('app', 'Apply_Form_Religeion') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="address" placeholder="<?= Yii::t('app', 'Apply_Form_Address') ?> *" required>
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="road" placeholder="<?= Yii::t('app', 'Apply_Form_Road') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="amphur" placeholder="<?= Yii::t('app', 'Apply_Form_Amphur') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="district" placeholder="<?= Yii::t('app', 'Apply_Form_District') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <select name="province" class="form-control select_box" required>
                        <option value=""><?= Yii::t('app', 'Apply_Form_Province') ?> * : <?= Yii::t('app', 'Select') ?></option>
                        <?php foreach (Yii::$app->params[$province] as $provinceData) : ?>
                        <option value="<?= $provinceData ?>" ><?= $provinceData ?></option>
                        <?php endforeach ?>
                    </select>                        
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="postcode" placeholder="<?= Yii::t('app', 'Apply_Form_Postcode') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="email" class="appointment_box" name="email" placeholder="<?= Yii::t('app', 'Apply_Form_Email') ?> *" required>
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box need_num" name="telephone" placeholder="<?= Yii::t('app', 'Apply_Form_Telephone') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box need_num" name="mobile_phone" placeholder="<?= Yii::t('app', 'Apply_Form_Mobile') ?> *" required>
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="id" placeholder="<?= Yii::t('app', 'Apply_Form_Id') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="issued" placeholder="<?= Yii::t('app', 'Apply_Form_Issued') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="expired" placeholder="<?= Yii::t('app', 'Apply_Form_Expired') ?>">
                </div>

                <div class="dotted_line col-xs-12"></div>

                <h3 class="col-xs-12"><?= Yii::t('app', 'Apply_Form_Education') ?></h3>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="high_school" placeholder="<?= Yii::t('app', 'Apply_Form_Highschool') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="major1" placeholder="<?= Yii::t('app', 'Apply_Form_Major') ?>">
                </div>

                <div class="col-xs-6 col-sm-2 career_field">
                    <input type="text" class="appointment_box need_num" name="year1" placeholder="<?= Yii::t('app', 'Apply_Form_Attended') ?>">
                </div>

                <div class="col-xs-6 col-sm-2 career_field">
                    <input type="text" class="appointment_box need_num" name="gpa1" placeholder="<?= Yii::t('app', 'Apply_Form_Gpa') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="vacational" placeholder="<?= Yii::t('app', 'Apply_Form_Vocational') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="major2" placeholder="<?= Yii::t('app', 'Apply_Form_Major') ?>">
                </div>

                <div class="col-xs-6 col-sm-2 career_field">
                    <input type="text" class="appointment_box need_num" name="year2" placeholder="<?= Yii::t('app', 'Apply_Form_Attended') ?>">
                </div>

                <div class="col-xs-6 col-sm-2 career_field">
                    <input type="text" class="appointment_box need_num" name="gpa2" placeholder="<?= Yii::t('app', 'Apply_Form_Gpa') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="diploma" placeholder="<?= Yii::t('app', 'Apply_Form_Diploma') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="major3" placeholder="<?= Yii::t('app', 'Apply_Form_Major') ?>">
                </div>

                <div class="col-xs-6 col-sm-2 career_field">
                    <input type="text" class="appointment_box need_num" name="year3" placeholder="<?= Yii::t('app', 'Apply_Form_Attended') ?>">
                </div>

                <div class="col-xs-6 col-sm-2 career_field">
                    <input type="text" class="appointment_box need_num" name="gpa3" placeholder="<?= Yii::t('app', 'Apply_Form_Gpa') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="bachelor" placeholder="<?= Yii::t('app', 'Apply_Form_Bachelor') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="major4" placeholder="<?= Yii::t('app', 'Apply_Form_Major') ?>">
                </div>

                <div class="col-xs-6 col-sm-2 career_field">
                    <input type="text" class="appointment_box need_num" name="year4" placeholder="<?= Yii::t('app', 'Apply_Form_Attended') ?>">
                </div>

                <div class="col-xs-6 col-sm-2 career_field">
                    <input type="text" class="appointment_box need_num" name="gpa4" placeholder="<?= Yii::t('app', 'Apply_Form_Gpa') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="master" placeholder="<?= Yii::t('app', 'Apply_Form_Master') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="major5" placeholder="<?= Yii::t('app', 'Apply_Form_Major') ?>">
                </div>

                <div class="col-xs-6 col-sm-2 career_field">
                    <input type="text" class="appointment_box need_num" name="year5" placeholder="<?= Yii::t('app', 'Apply_Form_Attended') ?>">
                </div>

                <div class="col-xs-6 col-sm-2 career_field">
                    <input type="text" class="appointment_box need_num" name="gpa5" placeholder="<?= Yii::t('app', 'Apply_Form_Gpa') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="others" placeholder="<?= Yii::t('app', 'Apply_Form_Others') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="major6" placeholder="<?= Yii::t('app', 'Apply_Form_Major') ?>">
                </div>

                <div class="col-xs-6 col-sm-2 career_field">
                    <input type="text" class="appointment_box need_num" name="year6" placeholder="<?= Yii::t('app', 'Apply_Form_Attended') ?>">
                </div>

                <div class="col-xs-6 col-sm-2 career_field">
                    <input type="text" class="appointment_box need_num" name="gpa6" placeholder="<?= Yii::t('app', 'Apply_Form_Gpa') ?>">
                </div>

                <h3 class="col-xs-12"><?= Yii::t('app', 'Apply_Form_Language') ?></h3>

                <div class="col-xs-12 col-sm-5 career_field">
                    <h4><?= Yii::t('app', 'Apply_Form_Thai') ?></h4>

                    <div class="language_radio">
                        <h5><?= Yii::t('app', 'Apply_Form_Speaking') ?></h5>
                        <input type="radio" name="speak_thai" value="0">
                        <span><?= Yii::t('app', 'Apply_Form_Good') ?></span>
                        <input type="radio" name="speak_thai" value="1">
                        <span><?= Yii::t('app', 'Apply_Form_Fair') ?></span>
                        <input type="radio" name="speak_thai" value="2">
                        <span><?= Yii::t('app', 'Apply_Form_Poor') ?></span>
                    </div>

                    <div class="language_radio">
                        <h5><?= Yii::t('app', 'Apply_Form_Writing') ?></h5>
                        <input type="radio" name="write_thai" value="0">
                        <span><?= Yii::t('app', 'Apply_Form_Good') ?></span>
                        <input type="radio" name="write_thai" value="1">
                        <span><?= Yii::t('app', 'Apply_Form_Fair') ?></span>
                        <input type="radio" name="write_thai" value="2">
                        <span><?= Yii::t('app', 'Apply_Form_Poor') ?></span>
                    </div>

                    <div class="language_radio">
                        <h5><?= Yii::t('app', 'Apply_Form_Reading') ?></h5>
                        <input type="radio" name="read_thai" value="0">
                        <span><?= Yii::t('app', 'Apply_Form_Good') ?></span>
                        <input type="radio" name="read_thai" value="1">
                        <span><?= Yii::t('app', 'Apply_Form_Fair') ?></span>
                        <input type="radio" name="read_thai" value="2">
                        <span><?= Yii::t('app', 'Apply_Form_Poor') ?></span>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-5 col-sm-offset-1 career_field">
                    <h4><?= Yii::t('app', 'Apply_Form_English') ?></h4>

                    <div class="language_radio">
                        <h5><?= Yii::t('app', 'Apply_Form_Speaking') ?></h5>
                        <input type="radio" name="speak_eng" value="0">
                        <span><?= Yii::t('app', 'Apply_Form_Good') ?></span>
                        <input type="radio" name="speak_eng" value="1">
                        <span><?= Yii::t('app', 'Apply_Form_Fair') ?></span>
                        <input type="radio" name="speak_eng" value="2">
                        <span><?= Yii::t('app', 'Apply_Form_Poor') ?></span>
                    </div>

                    <div class="language_radio">
                        <h5><?= Yii::t('app', 'Apply_Form_Writing') ?></h5>
                        <input type="radio" name="write_eng" value="0">
                        <span><?= Yii::t('app', 'Apply_Form_Good') ?></span>
                        <input type="radio" name="write_eng" value="1">
                        <span><?= Yii::t('app', 'Apply_Form_Fair') ?></span>
                        <input type="radio" name="write_eng" value="2">
                        <span><?= Yii::t('app', 'Apply_Form_Poor') ?></span>
                    </div>

                    <div class="language_radio">
                        <h5><?= Yii::t('app', 'Apply_Form_Reading') ?></h5>
                        <input type="radio" name="read_eng" value="0">
                        <span><?= Yii::t('app', 'Apply_Form_Good') ?></span>
                        <input type="radio" name="read_eng" value="1">
                        <span><?= Yii::t('app', 'Apply_Form_Fair') ?></span>
                        <input type="radio" name="read_eng" value="2">
                        <span><?= Yii::t('app', 'Apply_Form_Poor') ?></span>
                    </div>
                </div>

                <h3 class="col-xs-12"><?= Yii::t('app', 'Apply_Form_Working') ?></h3>

                <div class="col-xs-12 col-sm-6 career_field">
                    <input type="text" class="appointment_box" name="exp" placeholder="<?= Yii::t('app', 'Apply_Form_Working') ?>">
                </div>

                <div class="clear"></div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="company1" placeholder="<?= Yii::t('app', 'Apply_Form_Company') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box need_num" name="company_phone1" placeholder="<?= Yii::t('app', 'Apply_Form_Telephone') ?>">
                </div>

                <div class="col-xs-6 col-sm-2 career_field">
                    <input type="text" class="appointment_box" name="from1" placeholder="<?= Yii::t('app', 'Apply_Form_From') ?>">
                </div>

                <div class="col-xs-6 col-sm-2 career_field">
                    <input type="text" class="appointment_box" name="to1" placeholder="<?= Yii::t('app', 'Apply_Form_To') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="position1" placeholder="<?= Yii::t('app', 'Apply_Form_Position') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="description1" placeholder="<?= Yii::t('app', 'Apply_Form_Job') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="salary1" placeholder="<?= Yii::t('app', 'Apply_Form_Salary') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="company2" placeholder="<?= Yii::t('app', 'Apply_Form_Company') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box need_num" name="company_phone2" placeholder="<?= Yii::t('app', 'Apply_Form_Telephone') ?>">
                </div>

                <div class="col-xs-6 col-sm-2 career_field">
                    <input type="text" class="appointment_box" name="from2" placeholder="<?= Yii::t('app', 'Apply_Form_From') ?>">
                </div>

                <div class="col-xs-6 col-sm-2 career_field">
                    <input type="text" class="appointment_box" name="to2" placeholder="<?= Yii::t('app', 'Apply_Form_To') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="position2" placeholder="<?= Yii::t('app', 'Apply_Form_Position') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="description2" placeholder="<?= Yii::t('app', 'Apply_Form_Job') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="salary2" placeholder="<?= Yii::t('app', 'Apply_Form_Salary') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="company3" placeholder="<?= Yii::t('app', 'Apply_Form_Company') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box need_num" name="company_phone3" placeholder="<?= Yii::t('app', 'Apply_Form_Telephone') ?>">
                </div>

                <div class="col-xs-6 col-sm-2 career_field">
                    <input type="text" class="appointment_box" name="from3" placeholder="<?= Yii::t('app', 'Apply_Form_From') ?>">
                </div>

                <div class="col-xs-6 col-sm-2 career_field">
                    <input type="text" class="appointment_box" name="to3" placeholder="<?= Yii::t('app', 'Apply_Form_To') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="position3" placeholder="<?= Yii::t('app', 'Apply_Form_Position') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="description3" placeholder="<?= Yii::t('app', 'Apply_Form_Job') ?>">
                </div>

                <div class="col-xs-12 col-sm-4 career_field">
                    <input type="text" class="appointment_box" name="salary3" placeholder="<?= Yii::t('app', 'Apply_Form_Salary') ?>">
                </div>

                <div class="col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-4 career_field">
                    <input type="submit" value="<?= Yii::t('app', 'Btn_Submit') ?>" class="hover_btn full_width_btn">
                </div>

                <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken(); ?>">
            </form>
        </div>
    </div>
</div>

<?= $this->render('//layouts/service') ?>
<?php 
  $month = Yii::$app->language."_month";
  $gender = Yii::$app->language."_gender";
  $national = Yii::$app->language."_national";
?>
<div class="popup_container">

    <div class="popup" id="not_found_popup">
        <a href="" class="close_btn"><img src="images/close_btn.jpg" alt=""></a>
        <h2 class="text-center" style="color:#545454; margin: 40px 0 20px; font-size: 20px;"><?= Yii::t('app', 'Doctor_Not_Found') ?></h2>
    </div>

    <div class="popup" id="appointment_popup">
        <a href="" class="close_btn"><img src="images/close_btn.jpg" alt=""></a>
        <h2 class="text-center"><?= Yii::t('app', 'Appointment_Title') ?></h2>
        <form action="<?= Yii::$app->urlManager->createUrl(['site/appointment']) ?>" class="appointement_form">
            <div class="col-xs-12 appointment_field">
                <select id="select_specialty" name="specialty" class="form-control select_box" required>
                    <option value=""><?= Yii::t('app', 'Doctor_Specialty') ?> : <?= Yii::t('app', 'Select') ?></option>
                </select>                        
            </div>

            <div class="col-xs-12 appointment_field">
                <select id="select_doctor" name="doctor" class="form-control select_box" required>
                    <option value=""><?= Yii::t('app', 'Appointment_Doctor') ?> : <?= Yii::t('app', 'Select') ?></option>
                </select>                        
            </div>

            <div class="col-xs-12 col-sm-6 appointment_field">
                <select name="date" class="form-control select_box" required>
                    <option value=""><?= Yii::t('app', 'Appointment_Date') ?> : <?= Yii::t('app', 'Select') ?></option>
                    <?php 
                    for ($i = 0; $i < 10; $i++) 
                    {
                      $selectTime = time() + (24 * 60 * 60 * $i);
                    ?>
                    <option value="<?= $selectTime ?>"><?= Yii::t('app', 'Appointment_Date') ?> : <?= date("j", $selectTime) ?> <?= Yii::$app->params[$month][date("n", $selectTime) - 1] ?> <?= date("y", $selectTime) ?></option>
                    <?php
                    }
                    ?>
                </select>                        
            </div>

            <div class="col-xs-12 col-sm-6 appointment_field">
                <select name="time" class="form-control select_box" required>
                    <option value=""><?= Yii::t('app', 'Appointment_Time') ?> : <?= Yii::t('app', 'Select') ?></option>
                    <option value="1"><?= Yii::t('app', 'Appointment_Time') ?> : 07.00 - 08.00</option>
                    <option value="2"><?= Yii::t('app', 'Appointment_Time') ?> : 08.00 - 09.00</option>
                    <option value="3"><?= Yii::t('app', 'Appointment_Time') ?> : 09.00 - 10.00</option>
                    <option value="4"><?= Yii::t('app', 'Appointment_Time') ?> : 10.00 - 11.00</option>
                    <option value="5"><?= Yii::t('app', 'Appointment_Time') ?> : 11.00 - 12.00</option>
                    <option value="6"><?= Yii::t('app', 'Appointment_Time') ?> : 12.00 - 13.00</option>
                    <option value="7"><?= Yii::t('app', 'Appointment_Time') ?> : 13.00 - 14.00</option>
                    <option value="8"><?= Yii::t('app', 'Appointment_Time') ?> : 14.00 - 15.00</option>
                    <option value="9"><?= Yii::t('app', 'Appointment_Time') ?> : 15.00 - 16.00</option>
                    <option value="10"><?= Yii::t('app', 'Appointment_Time') ?> : 16.00 - 17.00</option>
                </select>                        
            </div>

            <div class="col-xs-12 appointment_field">
                <textarea id="describe" cols="30" rows="4" name="describe" class="appointment_box_textarea" placeholder="<?= Yii::t('app', 'Appointment_Desc') ?>" required></textarea>
            </div>

            <div class="col-xs-12 col-sm-6 appointment_field">
                <input type="text" class="appointment_box" name="name" placeholder="<?= Yii::t('app', 'Career_Form_Name') ?>" required>
            </div>

            <div class="col-xs-12 col-sm-6 appointment_field">
                <input type="text" class="appointment_box" name="last_name" placeholder="<?= Yii::t('app', 'Career_Form_Lastname') ?>" required>
            </div>

            <div class="col-xs-12 col-sm-6 appointment_field">
                <input type="text" class="appointment_box" name="dob" placeholder="<?= Yii::t('app', 'Apply_Form_BirthDate') ?>" required>
            </div>

            <div class="col-xs-12 col-sm-6 appointment_field">
                <select name="gender" class="form-control select_box" required>
                    <option value=""><?= Yii::t('app', 'Apply_Form_Gender') ?> : <?= Yii::t('app', 'Select') ?></option>
                    <?php for ($i = 0; $i < 2; $i++) : ?>
                    <option value="<?= $i ?>"><?= Yii::t('app', 'Apply_Form_Gender') ?> : <?= Yii::$app->params[$gender][$i] ?></option>
                    <?php endfor; ?>
                </select> 
            </div>

            <div class="col-xs-12 col-sm-6 appointment_field">
                <input type="text" class="appointment_box" name="phone" placeholder="<?= Yii::t('app', 'Apply_Form_Telephone') ?>" required>
            </div>

            <div class="col-xs-12 col-sm-6 appointment_field">
                <input type="email" class="appointment_box" name="email" placeholder="<?= Yii::t('app', 'Apply_Form_Email') ?>" required>
            </div>

            <div class="col-xs-12 appointment_field">
                <select name="nationality" class="form-control select_box" required>
                    <option value=""><?= Yii::t('app', 'Apply_Form_Nationality') ?> : <?= Yii::t('app', 'Select') ?></option>
                    <?php foreach (Yii::$app->params[$national] as $nationalValue) : ?>
                      <option value="<?= $nationalValue ?>"><?= $nationalValue ?></option>
                    <?php endforeach ?>
                </select>                        
            </div>

            <div class="col-xs-12 appointment_field">
                <h4><?= Yii::t('app', 'Appointment_Register') ?></h4>
                <input type="radio" name="register" value="1" required> <span><?= Yii::t('app', 'Appointment_Yes') ?></span>
                <input type="radio" name="register" value="0" required> <span><?= Yii::t('app', 'Appointment_No') ?></span>
                <label for="register" class="error"></label>
            </div>

            <div class="col-xs-12 appointment_field">
                <input type="submit" value="<?= Yii::t('app', 'Btn_Request_Appointment') ?>" class="hover_btn full_width_btn">
            </div>

            <div class="clear"></div>

            <div id="thankyou_appointment_container">
                <p><?= Yii::t('app', 'Appointment_Success') ?></p>
            </div>

            <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->getCsrfToken(); ?>">
        </form>
    </div>
</div>

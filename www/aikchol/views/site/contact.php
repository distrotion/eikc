<?php
    $this->title = 'AHC';
?>
<div class="container" id="contact_container">
    <div class="row">
        <h1 class="section_name"><?= Yii::t('app', 'Menu_Contact')?></h1>
        <div class="col-xs-12 col-sm-6">
            <div class="contact_info">
                <h3><?= Yii::t('app', 'Contact_Name1') ?></h3>
                <p class="light"><?= Yii::t('app', 'Contact_Address1') ?></p>
                <span><?= Yii::t('app', 'Telephone')?> : 038 939 999</span><br>
                <!-- <span><?= Yii::t('app', 'Email')?> : <a href="mailto:info@aikchol.com">info@aikchol.com</a> / <a href="mailto:marketing@aikchol.com">marketing@aikchol.com</a></span> -->
            </div>
            <div class="contact_info">
                <h3><?= Yii::t('app', 'Contact_Name2') ?></h3>
                <p class="light"><?= Yii::t('app', 'Contact_Address2') ?></p>
                <span><?= Yii::t('app', 'Telephone')?> : 038 939 888</span><br><br>
                <span><?= Yii::t('app', 'Email')?> : <a href="mailto:info@aikchol.com">info@aikchol.com</a> / <a href="mailto:marketing@aikchol.com">marketing@aikchol.com</a></span><br>
                <span><?= Yii::t('app', 'Line')?> : <a target="_blank" href="https://line.me/R/ti/p/%40aikchol_hospital">Aikchol Hospital</a></span>
                <!-- <span><?= Yii::t('app', '')?> <a href="https://line.me/R/ti/p/%40aikchol_hospital"><img height="36" border="0" alt="เพิ่มเพื่อน" src="https://scdn.line-apps.com/n/line_add_friends/btn/en.png"></a></span> -->
            </div>
        </div>
        <div class="col-xs-12 col-sm-6" id="contact_form_container">
            <form action="<?= Yii::$app->urlManager->createUrl(['site/send']) ?>" id="contact_form">
                <input type="text" name="name" placeholder="<?= Yii::t('app', 'ContactForm_Name') ?>" class="input_box" required>
                <input type="email" name="email" placeholder="<?= Yii::t('app', 'ContactForm_Email') ?>" class="input_box" required>
                <input type="text" name="subject" placeholder="<?= Yii::t('app', 'ContactForm_Subject') ?>" class="input_box" required>
                <textarea name="detail" id="contact_detail" placeholder="<?= Yii::t('app', 'ContactForm_Detail') ?>" cols="30" rows="10" required></textarea>
                <input type="submit" value="<?= Yii::t('app', 'Btn_Send') ?>" class="hover_btn full_width_btn">
            </form>

            <div id="thankyou_container">
                <p><?= Yii::t('app', 'Contact_Message') ?></p>
            </div>
        </div>
    </div>
</div>

<div class="container map_btn_container">
    <a href="" class="map_btn map_switch" id="map_image"><?= Yii::t('app', 'Btn_Map') ?></a>
    <a href="" class="map_btn map_switch" id="map_google"><?= Yii::t('app', 'Btn_Google_Map') ?></a>
    <a href="./images/map_<?= Yii::$app->language ?>.pdf" target="_blank" class="map_btn"><?= Yii::t('app', 'Btn_Download_Map') ?></a>
</div>

<div class="map_container">
    <div class="contact_location">
        <img src="images/location_img2.jpg" alt="">
        <div class="location_center">
            <img src="images/location_icon_white.png" alt="">
            <h3><?= Yii::t('app', 'Contact_Location') ?></h3>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){

        $(".map_switch").on('click', function(){
            $(this).addClass('map_active').siblings().removeClass('map_active');
            return false;
        });

        $("#map_image").on('click', function(){
            $(".map_container").html('<img src="images/map_<?= Yii::$app->language ?>.jpg">');
            return false;
        });

        $("#map_google").on('click', function(){
            $(".map_container").html('<div class="iframe-rwd"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8249.478346908934!2d100.9767885678443!3d13.354534684540262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d4a78d646d8b9%3A0x7a6296ccbbbd6dda!2z4LmC4Lij4LiH4Lie4Lii4Liy4Lia4Liy4Lil4LmA4Lit4LiB4LiK4Lil!5e0!3m2!1sth!2sth!4v1439486432422" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>');
            return false;
        });

        $('.map_container').click(function () {
            $('.map_container iframe').css("pointer-events", "auto");
        });

    });
</script>

<?php
    use yii\helpers\Html; 
    use yii\helpers\Url;
    use yii\widgets\ActiveForm;
    $this->title = 'AHC';
    $title = Yii::$app->language."_title";
?>

<div class="section_main_img" id="careers_main_img">
            
</div>

<div class="container have_main_img normal_container">
    <div class="row">
        <h1 class="section_name"><?= Yii::t('app', 'Career_Position') ?></h1>
    </div>

    <div class="row">
        <ul class="careers_list clearfix">
            <?php foreach ($jobs as $job) : ?>
            <li>
                <h3><?= $job->$title ?></h3>
                <a href="<?= Yii::$app->urlManager->createUrl(['site/apply', 'position_id' => $job->id])?>" class="hover_btn2"><?= Yii::t('app', 'Btn_Apply') ?></a>
            </li>
            <?php endforeach ?>
        </ul>

        <div class="align_center">
            <a href="<?= Yii::$app->urlManager->createUrl(['site/positions'])?>" class="hover_btn"><?= Yii::t('app', 'Btn_Position_All') ?></a>
        </div>
    </div>
</div>

<div class="container normal_container" style="padding-top:0;">
    <div class="row">
        <h1 class="section_name"><?= Yii::t('app', 'Career_Apply') ?></h1>
    </div>

    <div class="row">
        <?php 
            $form = ActiveForm::begin([
                        'method' => 'get',
                        'action' => Url::to(['site/apply']),
                        'id' => "apply_form1",
                        'options' => [
                            'class' => "col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3"
                         ]
                    ]);
        ?>
            <div class="col-xs-12 career_field">
                <select name="position_id" class="form-control select_box blue_bg" required>
                    <option value=""><?= Yii::t('app', 'Select_Position') ?></option>
                    <?php foreach ($jobs as $job) : ?>
                    <option value="<?= $job->id?>"><?=$job->$title?></option>
                    <?php endforeach ?>
                </select> 
            </div>
            <div class="col-xs-12 career_field">
                <input type="text" class="appointment_box" name="salary" placeholder="<?= Yii::t('app', 'Career_Form_Salary') ?>">
            </div>

            <div class="col-xs-12 col-sm-6 career_field">
                <input type="text" class="appointment_box" name="name" placeholder="<?= Yii::t('app', 'Career_Form_Name') ?> *" required>
            </div>

            <div class="col-xs-12 col-sm-6 career_field">
                <input type="text" class="appointment_box" name="last_name" placeholder="<?= Yii::t('app', 'Career_Form_Lastname') ?> *" required>
            </div>

            <div class="col-xs-12 career_field" style="text-align:center;">
                <input type="submit" value="<?= Yii::t('app', 'Btn_Next') ?>" class="hover_btn" id="apply_next_btn">
            </div>
        <?php
            ActiveForm::end();
        ?>
    </div>
</div>

<?= $this->render('//layouts/service'); ?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\touchspin\TouchSpin;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Banners */
/* @var $form yii\widgets\ActiveForm */
if ($model->isNewRecord)
{
    $model->index_weight = 0;
}

?>

<div class="banners-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'th_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'en_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'th_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'en_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'th_link_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'en_link_text')->textInput(['maxlength' => true]) ?>

    <?php if ($model->th_center_image != "") echo '<img src="'.$model->th_center_image.'" height="160"/>';?>
    <?= $form->field($model, 'th_center_image')->widget(FileInput::classname(), [
                                                'options' => ['accept' => 'image/*'],
                                                'pluginOptions' => [
                                                    'showUpload' => false,
                                                ]
                                        ]); 
    ?>

    <?php if ($model->en_center_image != "") echo '<img src="'.$model->en_center_image.'" height="160"/>';?>
    <?= $form->field($model, 'en_center_image')->widget(FileInput::classname(), [
                                                'options' => ['accept' => 'image/*'],
                                                'pluginOptions' => [
                                                    'showUpload' => false,
                                                ]
                                        ]); 
    ?>

    <?php if ($model->th_image != "") echo '<img src="'.$model->th_image.'" height="160"/>';?>
    <?= $form->field($model, 'th_image')->widget(FileInput::classname(), [
                                                'options' => ['accept' => 'image/*'],
                                                'pluginOptions' => [
                                                    'showUpload' => false,
                                                ]
                                        ]); 
    ?>

    <?php if ($model->en_image != "") echo '<img src="'.$model->en_image.'" height="160"/>';?>
    <?= $form->field($model, 'en_image')->widget(FileInput::classname(), [
                                                'options' => ['accept' => 'image/*'],
                                                'pluginOptions' => [
                                                    'showUpload' => false,
                                                ]
                                        ]); 
    ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'index_weight')->widget(TouchSpin::classname(), ['options' => ['placeholder' => 'Adjust ...'],]); ?>

    <?= $form->field($model, 'active')->dropdownList([
                                            '1' => 'Active',
                                            '0' => 'Not active',
                                        ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

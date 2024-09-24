<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\touchspin\TouchSpin;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Csrs */
/* @var $form yii\widgets\ActiveForm */
if ($model->isNewRecord)
{
    $model->index_weight = 0;
}

?>

<div class="csrs-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'th_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'en_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'th_caption')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'en_caption')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'th_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'en_desc')->textarea(['rows' => 6]) ?>

    <?php if ($model->th_thumb_image != "") echo '<img src="'.$model->th_thumb_image.'" height="160"/>';?>
    <?= $form->field($model, 'th_thumb_image')->widget(FileInput::classname(), [
                                                'options' => ['accept' => 'image/*'],
                                                'pluginOptions' => [
                                                    'showUpload' => false,
                                                ]
                                        ]); 
    ?>

    <?php if ($model->en_thumb_image != "") echo '<img src="'.$model->en_thumb_image.'" height="160"/>';?>
    <?= $form->field($model, 'en_thumb_image')->widget(FileInput::classname(), [
                                                'options' => ['accept' => 'image/*'],
                                                'pluginOptions' => [
                                                    'showUpload' => false,
                                                ]
                                        ]); 
    ?>

    <?php if ($model->th_panorama_image != "") echo '<img src="'.$model->th_panorama_image.'" height="160"/>';?>
    <?= $form->field($model, 'th_panorama_image')->widget(FileInput::classname(), [
                                                'options' => ['accept' => 'image/*'],
                                                'pluginOptions' => [
                                                    'showUpload' => false,
                                                ]
                                        ]); 
    ?>

    <?php if ($model->en_panorama_image != "") echo '<img src="'.$model->en_panorama_image.'" height="160"/>';?>
    <?= $form->field($model, 'en_panorama_image')->widget(FileInput::classname(), [
                                                'options' => ['accept' => 'image/*'],
                                                'pluginOptions' => [
                                                    'showUpload' => false,
                                                ]
                                        ]); 
    ?>

    <?= $form->field($model, 'show_about')->checkbox() ?>

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

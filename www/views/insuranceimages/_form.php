<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\touchspin\TouchSpin;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\InsuranceImages */
/* @var $form yii\widgets\ActiveForm */
if ($model->isNewRecord)
{
    $model->index_weight = 0;
}

?>

<div class="insurance-images-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

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

    <?= $form->field($model, 'show_first')->checkbox() ?>

    <?= $form->field($model, 'index_weight')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

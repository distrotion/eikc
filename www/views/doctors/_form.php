<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\touchspin\TouchSpin;
use kartik\file\FileInput;
use unclead\multipleinput\MultipleInput;

/* @var $this yii\web\View */
/* @var $model app\models\Doctors */
/* @var $form yii\widgets\ActiveForm */
if ($model->isNewRecord) {
    $model->index_weight = 0;
}

?>

<div class="doctors-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'th_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'en_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'line')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_id')->dropdownList($services) ?>

    <?= $form->field($model, 'location')->dropdownList(Yii::$app->params["location"]) ?>

    <?php if ($model->th_image != "") echo '<img src="' . $model->th_image . '" height="160"/>'; ?>
    <?= $form->field($model, 'th_image')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showUpload' => false,
        ]
    ]);
    ?>

    <?php if ($model->en_image != "") echo '<img src="' . $model->en_image . '" height="160"/>'; ?>
    <?= $form->field($model, 'en_image')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showUpload' => false,
        ]
    ]);
    ?>

    <?php if ($model->image_schedule_th != "") echo '<img src="' . $model->image_schedule_th . '" height="160"/>'; ?>
    <?= $form->field($model, 'image_schedule_th')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showUpload' => false,
        ]
    ]);
    ?>

    <?php if ($model->image_schedule_en != "") echo '<img src="' . $model->image_schedule_en . '" height="160"/>'; ?>
    <?= $form->field($model, 'image_schedule_en')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showUpload' => false,
        ]
    ]);
    ?>

    <?= $form->field($model, 'show_first')->checkbox() ?>

    <?= $form->field($model, 'index_weight')->widget(TouchSpin::classname(), ['options' => ['placeholder' => 'Adjust ...'],]); ?>

    <?= $form->field($doctorDescription, 'information')->widget(MultipleInput::className(), [
        'max' => 99,
        'columns' => [
            [
                'name'  => 'information_year_th',
                'title' => 'Year Th',
                'type'  => \unclead\multipleinput\MultipleInputColumn::TYPE_TEXT_INPUT,
            ],
            [
                'name'  => 'information_th',
                'title' => 'Information Th',
                'type'  => \unclead\multipleinput\MultipleInputColumn::TYPE_TEXT_INPUT,
            ],
            [
                'name'  => 'information_year_en',
                'title' => 'Year En',
                'type'  => \unclead\multipleinput\MultipleInputColumn::TYPE_TEXT_INPUT,
            ],
            [
                'name'  => 'information_en',
                'title' => 'Information en',
                'type'  => \unclead\multipleinput\MultipleInputColumn::TYPE_TEXT_INPUT,
            ],
        ]
    ]);
    ?>

    <?= $form->field($doctorDescription, 'trainning')->widget(MultipleInput::className(), [
        'max' => 99,
        'columns' => [
            [
                'name'  => 'specialized_training_year_th',
                'title' => 'Specialized Year Th',
                'type'  => \unclead\multipleinput\MultipleInputColumn::TYPE_TEXT_INPUT,
            ],
            [
                'name'  => 'specialized_training_th',
                'title' => 'Specialized Training Th',
                'type'  => \unclead\multipleinput\MultipleInputColumn::TYPE_TEXT_INPUT,
            ],
            [
                'name'  => 'specialized_training_year_en',
                'title' => 'Specialized Year En',
                'type'  => \unclead\multipleinput\MultipleInputColumn::TYPE_TEXT_INPUT,
            ],
            [
                'name'  => 'specialized_training_en',
                'title' => 'Specialized Training En',
                'type'  => \unclead\multipleinput\MultipleInputColumn::TYPE_TEXT_INPUT,
            ],
        ]
    ]);
    ?>

    <?= $form->field($model, 'active')->dropdownList([
        '1' => 'Active',
        '0' => 'Not active',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

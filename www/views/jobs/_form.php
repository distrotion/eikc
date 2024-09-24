<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\touchspin\TouchSpin;

/* @var $this yii\web\View */
/* @var $model app\models\Jobs */
/* @var $form yii\widgets\ActiveForm */
if ($model->isNewRecord)
{
    $model->index_weight = 0;
}

?>

<div class="jobs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'th_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'en_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->dropdownList(Yii::$app->params["location"]) ?>

    <?= $form->field($model, 'th_functional')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'en_functional')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'th_qualification')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'en_qualification')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'show_first')->checkbox() ?>

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

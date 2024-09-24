<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Export Appointments';
$this->params['breadcrumbs'][] = $this->title;

$jobList = ["0" => "All Position"];

foreach ($jobs as $job)
{
	$jobList[$job->id] = $job->en_title;
}

?>

<div class="export-appointments">

    <h1><?= Html::encode($this->title) ?></h1><br/>

    <?php $form = ActiveForm::begin(['options'=>['target' => '_blank']]); ?>

    <?= Html::label('Position', 'position_id') ?>
	<?= Html::dropDownList('position_id', null, $jobList, ["id" => 'position_id']) ?>

	<br/><br/>
	
    <div class="form-group">
        <?= Html::submitButton('Export' , ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

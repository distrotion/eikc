<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Export Contacts From Customer';
$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
$timeList = [];
foreach ($times as $time)
{
	$timeList[$time['date_time']] = $time['date_time'];
}

?>

<div class="export-contacts">

    <h1><?= Html::encode($this->title) ?></h1><br/>

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data', 'target' => '_blank']]); ?>

    <div class="col-md-12" style="padding:0px;">
    	<div class="col-md-3" style="padding:0px;">
		    <?= Html::label('Start Date', 'start_date') ?>
		    <?= Html::dropDownList('start_date', null, $timeList, ["id" => 'start_date']) ?> 
    	</div>
    	<div class="col-md-3">
    		<?= Html::label('End Date', 'end_date') ?>
    		<?= Html::dropDownList('end_date', null, $timeList, ["id" => 'end_date']) ?>
    	</div>
	</div>
	<br/><br/>


    <div class="form-group">
        <?= Html::submitButton('Export' , ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
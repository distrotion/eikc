<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Export Appointments';
$this->params['breadcrumbs'][] = $this->title;

$services = ['0' => 'All Services'];
foreach ($serviceList as $id => $serviceName)
{
	$services[$id] = $serviceName;
}

$doctors = ['0' => 'All Doctors'];

$appointmentDate = ['0' => 'All Date'];

$appointmentDate = array_merge($appointmentDate, $appointmentTime);

$appointmentTimePeriod = ['0' => 'All Time'];
$appointmentTimePeriod = array_merge($appointmentTimePeriod, Yii::$app->params["appointment_time"]);

?>

<div class="export-appointments">

    <h1><?= Html::encode($this->title) ?></h1><br/>

    <?php $form = ActiveForm::begin(['options'=>['target' => '_blank']]); ?>

    <div class="col-md-12" style="padding:0px;">
    	<div class="col-md-3" style="padding:0px;">
    		<?= Html::label('Specialty', 'service_id') ?>
    		<?= Html::dropDownList('service_id', null, $services, ["id" => 'service_id']) ?> 
    	</div>
    	<div class="col-md-3" style="padding:0px;">
    		<?= Html::label('Doctor', 'doctor_id') ?>
    		<?= Html::dropDownList('doctor_id', null, $doctors, ["id" => 'doctor_id']) ?> 
    	</div>
    	<div class="col-md-3" style="padding:0px;">
    		<?= Html::label('Appointment Date', 'appointment') ?>
    		<?= Html::dropDownList('appointment', null, $appointmentDate, ["id" => 'appointment']) ?> 
    	</div>
		<div class="col-md-3" style="padding:0px;">
			<?= Html::label('Appointment Time', 'appointment_time') ?>
    		<?= Html::dropDownList('appointment_time', null, $appointmentTimePeriod, ["id" => 'appointment_time']) ?>
    	</div>
    </div>
    <br/><br/>
    <div class="form-group">
        <?= Html::submitButton('Export' , ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
	$(document).ready(function(){
		var serviceList = [];

		<?php foreach ($serviceList as $id => $service) :	?>
		serviceList[<?= $id ?>] = [];
		<?php endforeach; ?>

		<?php foreach ($doctorList as $service_id => $doctor): ?>
			<?php foreach ($doctor as $id => $name) : ?>
			serviceList[<?= $service_id ?>][<?= $id ?>] = '<?= $name ?>';
			<?php endforeach; ?>
		<?php endforeach; ?>

		$("#service_id").on('change', function(){
			$("#doctor_id").empty().append("<option value='0'>All Doctors</option>");

			var serviceId = $("#service_id").val();

			if (serviceId > 0) {
				for (var doctor in serviceList[serviceId]) {
					$("#doctor_id").append("<option value='" + doctor + "'>" + serviceList[serviceId][doctor] + "</option>")
				}
			}

		});
	});
	
</script>
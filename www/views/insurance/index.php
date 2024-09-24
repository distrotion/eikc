<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
$this->title = 'Insurance Content';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="insurance-index">
	<h2>insurance/index</h2>
	<br/>
	<?php $form = ActiveForm::begin(['action' => ['index']]); ?>

	<?= Html::label('Th Insurance', 'thInsurance') ?><br/>
	<?= Html::textarea('thInsurance', $thInsurance,['rows' => 10, 'cols' => 100]) ?><br/>

	<?= Html::label('En Insurance', 'enInsurance') ?><br/>
	<?= Html::textarea('enInsurance', $enInsurance,['rows' => 10, 'cols' => 100]) ?><br/>

	<?= Html::submitButton('Update', ['class'=>'btn btn-primary']); ?>

    <?php ActiveForm::end(); ?>

</div>

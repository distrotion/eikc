<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InsuranceImages */

$this->title = 'Update Insurance Images: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Insurance Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="insurance-images-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InsuranceImages */

$this->title = 'Create Insurance Images';
$this->params['breadcrumbs'][] = ['label' => 'Insurance Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="insurance-images-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CsrImages */

$this->title = 'Update Csr Images: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Csr', 'url' => ['csrs/update', 'id' => $model->csr_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="csr-images-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

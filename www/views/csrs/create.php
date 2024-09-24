<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Csrs */

$this->title = 'Create Csrs';
$this->params['breadcrumbs'][] = ['label' => 'Csrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="csrs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

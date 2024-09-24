<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Healths */

$this->title = 'Create Healths';
$this->params['breadcrumbs'][] = ['label' => 'Healths', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="healths-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

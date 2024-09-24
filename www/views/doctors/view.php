<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Doctors */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Doctors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctors-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'th_title',
            'en_title',
            'service_id',
            'location',
            'th_image',
            'en_image',
            'show_first',
            'index_weight',
            'line',
            'mobile',
            'image_schedule_th',
            'image_schedule_en',
            [
                'label' => 'Information',
                'value' => function ($model) use ($doctorDescriptions) {
                    $htmlText = '';
                    foreach ($doctorDescriptions as $doctorDescription) {
                        $htmlText .= '<p>Information Year Th: '.$doctorDescription->information_year_th.'</p>';
                        $htmlText .= '<p>Information Th: '.$doctorDescription->information_th.'</p>';
                        $htmlText .= '<p>Information Year En: '.$doctorDescription->information_year_en.'</p>';
                        $htmlText .= '<p>Information En: '.$doctorDescription->information_en.'</p>';
                    }
                    return $htmlText;
                },
                'format' => 'html',
            ],
            [
                'label' => 'Specialized Training',
                'value' => function ($model) use ($doctorDescriptions) {
                    $specializedHtmlText = '';
                    foreach ($doctorDescriptions as $doctorDescription) {
                        $specializedHtmlText .= '<p>Specialized Year Th: '.$doctorDescription->specialized_training_year_th.'</p>';
                        $specializedHtmlText .= '<p>Specialized Th: '.$doctorDescription->specialized_training_th.'</p>';
                        $specializedHtmlText .= '<p>Specialized Year En: '.$doctorDescription->specialized_training_year_en.'</p>';
                        $specializedHtmlText .= '<p>Information En: '.$doctorDescription->specialized_training_en.'</p>';
                    }
                    return $specializedHtmlText;
                },
                'format' => 'html',
            ],
            'active',
            'update_time:datetime',
            'create_time:datetime',
        ],
    ]) ?>

</div>

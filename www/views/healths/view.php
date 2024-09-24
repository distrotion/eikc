<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Healths */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Healths', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="healths-view">

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
            'th_caption',
            'en_caption',
            'th_desc:ntext',
            'en_desc:ntext',
            'th_left_text:ntext',
            'en_left_text:ntext',
            'th_right_text:ntext',
            'en_right_text:ntext',
            'th_thumb_image',
            'en_thumb_image',
            'th_image',
            'en_image',
            'show_first',
            'index_weight',
            'active',
            'update_time:datetime',
            'create_time:datetime',
        ],
    ]) ?>

</div>

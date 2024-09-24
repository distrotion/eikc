<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Services';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Services', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'th_title',
            'en_title',
            'location',
            'th_desc:ntext',
            // 'en_desc:ntext',
            // 'th_sub_desc:ntext',
            // 'en_sub_desc:ntext',
            // 'th_left_text:ntext',
            // 'en_left_text:ntext',
            // 'th_right_text:ntext',
            // 'en_right_text:ntext',
            // 'th_address:ntext',
            // 'en_address:ntext',
            // 'th_thumb_image',
            // 'en_thumb_image',
            // 'th_panorama_image',
            // 'en_panorama_image',
            // 'th_image',
            // 'en_image',
            // 'show_first',
            // 'index_weight',
            // 'active',
            // 'update_time:datetime',
            // 'create_time:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

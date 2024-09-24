<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rooms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rooms-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Rooms', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'th_title',
            'en_title',
            'th_caption:ntext',
            'en_caption:ntext',
            // 'th_desc:ntext',
            // 'en_desc:ntext',
            // 'th_sub_desc:ntext',
            // 'en_sub_desc:ntext',
            // 'th_thumb_image',
            // 'en_thumb_image',
            // 'th_panorama_image',
            // 'en_panorama_image',
            // 'th_image',
            // 'en_image',
            // 'index_weight',
            // 'active',
            // 'update_time:datetime',
            // 'create_time:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

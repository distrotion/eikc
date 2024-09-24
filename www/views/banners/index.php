<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banners-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Banners', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'th_title',
            'en_title',
            'th_desc',
            'en_desc',
            // 'th_link_text',
            // 'en_link_text',
            // 'th_btn_msg',
            // 'en_btn_msg',
            // 'th_center_image',
            // 'en_center_image',
            // 'th_image',
            // 'en_image',
            // 'link',
            // 'index_weight',
            // 'active',
            // 'update_time:datetime',
            // 'create_time:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

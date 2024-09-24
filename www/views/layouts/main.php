<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Aikchol Hospital',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $navItems = [
            ['label' => 'Home', 'url' => ['/site/index']]
        ];

    if (Yii::$app->user->isGuest)
    {
        array_push($navItems, ['label' => 'Login', 'url' => ['/user/security/login']]);
    }
    else
    {
        array_push($navItems, ['label' => 'Banner', 'url' => ['/banners/index']]);
        array_push($navItems, ['label' => 'Health Tips', 'url' => ['/healths/index']]);
        array_push($navItems, ['label' => 'Services', 'url' => ['/services/index']]);
        array_push($navItems, ['label' => 'Doctor', 'url' => ['/doctors/index']]);
        array_push($navItems, ['label' => 'Package', 'url' => ['/packages/index']]);
        array_push($navItems, ['label' => 'Insurance', 
                'items' => [
                   ['label' => 'Contents', 'url' => ['/insurance/index']],
                   ['label' => 'Images', 'url' => ['/insuranceimages/index']],
                ]]);
            
        array_push($navItems, ['label' => 'Room', 'url' => ['/rooms/index']]);
        array_push($navItems, ['label' => 'CSR', 'url' => ['/csrs/index']]);
        array_push($navItems, ['label' => 'Jobs', 'url' => ['/jobs/index']]);
        array_push($navItems, [
                        'label' => 'Export',
                        'items' => [
                             ['label' => 'Export Contact', 'url' => ['export/contact']],
                             ['label' => 'Export Appointment', 'url' => ['export/appointment']],
                             ['label' => 'Export Application', 'url' => ['export/application']],
                        ],
                    ]);    
        array_push($navItems, ['label' => 'Logout (' . Yii::$app->user->identity->username . ')', 'url' => ['/user/security/logout'] ,'linkOptions' => ['data-method' => 'post']]);
    }
    
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $navItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Tabs;
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

    <?= $this->render('navbar'); ?>

    <div class="container">
        <div class="col-md-1 tabbable tabs-left">
            <?php
            echo Tabs::widget([
                'items' => [
                    [
                        'label' => '<div class="sprite white-book"></div> Books',
                        'url'=> ['/book/index'],
                    ],
                    [
                        'label' => '<div class="sprite user"></div> Users',
                        'url'=> ['/user/index'],
                    ]
                ],
                'class' => 'nav nav-tabs',
                'encodeLabels' => false,
            ]);
            ?>
        </div>

        <div class="col-md-11 white-layout">
            <div class="tab-content layout">
                <div class="tab-pane active" id="a">
                    <div class="container">
                        <?= $content ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->render('footer'); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

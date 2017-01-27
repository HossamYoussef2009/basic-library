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

    <?php
    NavBar::begin([
        'brandLabel' => '<div class="sprite logo"></div>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => '<span class="glyphicon glyphicon-home"></span> Home', 'url' => ['/site/index']],
            ['label' => '<span class="glyphicon glyphicon-question-sign">About', 'url' => ['/site/about']],
            Yii::$app->user->isGuest ? (
            ['label' => '<span class="glyphicon glyphicon-user">Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    '<span class="glyphicon glyphicon-off">Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
        'encodeLabels' => false,
    ]);
    NavBar::end();
    ?>

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

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; BookingKit.de Applicant Test <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

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
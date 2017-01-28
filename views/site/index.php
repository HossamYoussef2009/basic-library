<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Basic Library Application</h1>

        <p><a class="btn btn-lg btn-success" href="<?= \yii\helpers\Url::toRoute('/user/index'); ?>">Show all users</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-10">
                <h2>Important Notes:</h2>

                <ul>
                    <li>
                        Developed in Yii2 framework for Basic MVC concept implementation
                    </li>
                    <li>
                        PHP 5.6, MySQL, Bootstrap, Css3, JS, Ajax and PhpStorm IDE.
                    </li>
                </ul>
            </div>

        </div>

    </div>
</div>

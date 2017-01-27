<?php

/* @var $this yii\web\View */

$this->title = 'Basic Library: Users Page';
?>
<div class="col-md-12">

    <div class="row">
        <?php
        echo \yii\bootstrap\Button::Widget([
            'label' => '',
            'options'=>[
                'class' => 'button-animation add-user-button',
            ],
        ]);
        ?>
    </div>

    <div class="row">
        <hr class="fancy-line">
        <div class="col-md-1">
            <img src="/images/hossam.png" class="circular--square"/>
        </div>
        <div class="col-md-3">
            <p class="lead">
                Hossam Youssef
            </p>
            <small>
                Berlin, 12345
            </small>
        </div>

        <div class="col-md-1">
            <div class="sprite book">
                2
            </div>
        </div>

        <div class="col-md-2">
            -- dsdasdasda <br>
            -- asdasdasdas <br>
        </div>

        <div class="col-md-2">
            <ul>
                <li>sass</li>
                <li>sass</li>
            </ul>
        </div>

        <div class="col-md-1 right">
            <div class="sprite add"></div>
        </div>

    </div>
</div>

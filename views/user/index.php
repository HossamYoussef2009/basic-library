<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;
use yii\base\view;
use yii\helpers\Url;

$this->title = 'Basic Library: Users Page';
?>
<div class="col-md-12">

    <div class="row">
        <?php
                echo \yii\bootstrap\Button::Widget([
                    'label' => '',
                    'options'=>[
                        'value' => \yii\helpers\Url::to(['user/lend']),
                        'class' => 'button-animation add-user-button',
                        'id' => 'add-user-toggle',
                    ],
                ]);
                ?>
        <div id='add-user-form' style='display:none;'>
            <?= $this->render('/user/_form', ['model' => $model]); ?>
        </div>
    </div>

    <div class="row">
        <?php
        echo LinkPager::widget([
            'pagination' => $pagination,
        ]);
        ?>
    </div>

    <?php foreach ($users as $user) { ?>
    <div class="row">
        <hr class="fancy-line">
        <div class="col-md-1">
            <img src="<?php
            if ($user->photo != null) {
                echo Url::to('@uploads/images/user/' . $user->photo);
            }else{
                echo Url::to('@web/images/user.png');
            } ?>" class="circular--square"/>
        </div>
        <div class="col-md-3">
            <p class="lead">
                <?=$user->first_name . ' ' .$user->last_name; ?>
            </p>
            <small>
                <?=$user->city . ' ' .$user->zip; ?>
            </small>
        </div>

        <div class="col-md-1">
            <div class="sprite book">
                <div class="sprite book text"><?=$user->booksCount; ?></div>
            </div>
        </div>

        <div class="col-md-4">
            <?php foreach ($user->books as $book) { ?>
                <div class="book-info-title">
                    <?=$book->title; ?>
                </div>
                <div class="book-info-author">
                    - <?=$book->author; ?>
                </div>

            <?php } ?>
                <?php
                if($user->booksCount < $books_model::$LEND_LIMIT) {
                    echo $this->render('/book/_form', [
                        'model' => $books_model,
                        'books_items' => $books_items,
                        'user_id' => $user->id
                    ]);
                }
                ?>
        </div>

        <div class="col-md-1 right">
            <?php
            if($user->booksCount < $books_model::$LEND_LIMIT) {
                echo \yii\bootstrap\Button::Widget([
                    'label' => '',
                    'options'=>[
                        'value' => \yii\helpers\Url::to(['user/lend']),
                        'class' => 'sprite add',
                        'id' => 'add-book-toggle',
                        'data-toggle' => $user->id
                    ],
                ]);
            }
            ?>
        </div>

    </div>
    <?php } ?>

</div>
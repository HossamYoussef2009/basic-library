<div class="col-sm-9">
    <?php
    $form = \yii\widgets\ActiveForm::begin([
        'id' => 'lend-book-id',
        'class' => 'form-inline',
        'action' => 'lend-book',
        'enableAjaxValidation' => true,
        'validationUrl' => 'validate-lend-book',
    ]);
    
    echo $form->field($model, 'book_id', [
        'inputOptions' => [
            'class' => 'form-control',
            'required' => true
        ],
    ])->dropdownList($books_items, ['prompt'=>'Choose a book *'])->label(false);

    echo $form->field($model, 'user_id')->hiddenInput([
        'value' => $user_id
    ])->label(false);

    ?>
</div>

<div class="col-sm-3">
    <?php
    echo \yii\bootstrap\Html::submitButton('Save', ['class' => 'btn btn-success']);

    $form->end();
    ?>
</div>
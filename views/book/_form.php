<div class="col-sm-9">
    <?php
    $form = \yii\widgets\ActiveForm::begin([
        'id' => 'lend-book-form',
        'class' => 'form-inline',
        'action' => 'lend-book',
        'enableAjaxValidation' => true,
        'validationUrl' => 'validation-rul',
    ]);

    $books = \app\models\Book::find()
        ->active()
        ->select(['id', 'title'])
        ->column();

    echo $form->field($model, 'title', [
        'inputOptions' => [
            'placeholder' => 'Choose a book *',
            'class' => 'form-control',
            'required' => true
        ],
    ])->dropdownList(array_merge(['' => 'Choose a book'], $books))->label(false);

    ?>
</div>
<div class="col-sm-3">

    <?php
    echo \yii\bootstrap\Html::submitButton('Save', ['class' => 'btn btn-success']);

    $form->end();
    ?>
</div>
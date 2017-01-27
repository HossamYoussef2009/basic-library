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

    $model = new \app\models\Book();

    echo $form->field($model, 'title', [
        'inputOptions' => [
            'class' => 'form-control',
            'required' => true
        ],
    ])->dropdownList($books, ['prompt'=>'Choose a book *'])->label(false);

    ?>
</div>
<div class="col-sm-3">

    <?php
    echo \yii\bootstrap\Html::submitButton('Save', ['class' => 'btn btn-success']);

    $form->end();
    ?>
</div>
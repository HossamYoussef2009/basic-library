<div class="col-md-12 dark-form">

    <br><hr class="line-user-data"><br>
    <?php
    $form = \yii\widgets\ActiveForm::begin([
        'options' => [
            'class' => 'save-user',
            'enctype' => 'multipart/form-data'
        ],
        'class' => 'form-inline',
        'action' =>  ['user/save'],
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
    ]);
    ?>
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'salutation', [
                'template' => '<div class="input-group"><span class="input-group-addon">+</span>{input}</div>',
                'inputOptions' => [
                    'placeholder' => $model->getAttributeLabel('salutation') . ' *',
                    'class' => 'form-control'
                ],
            ])->dropdownList([
                'Mr' => 'Mr',
                'Mrs' => 'Mrs',
            ])->label(false);
            ?>
        </div>

        <div class="col-sm-4">
            <?= $form->field($model, 'title', [
                'template' => '<div class="input-group"><span class="input-group-addon">+</span>{input}</div>',
                'inputOptions' => [
                    'placeholder' => $model->getAttributeLabel('title'),
                    'class' => 'form-control'
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-sm-4">
            <?= $form->field($model, 'photo', [
                'template' => '<div class="input-group"><span class="input-group-addon">+</span>{input}</div>',
                'inputOptions' => [
                    'placeholder' => $model->getAttributeLabel('photo'),
                    'class' => 'form-control'
                ],
            ])->fileInput()->label(false);
            ?>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'first_name', [
                'template' => '<div class="input-group"><span class="input-group-addon">+</span>{input}</div>',
                'inputOptions' => [
                    'placeholder' => $model->getAttributeLabel('first_name') . ' *',
                    'class' => 'form-control'
                ],
            ])->label(false);
            ?>
            <?= $form->field($model, 'last_name', [
                'template' => '<div class="input-group"><span class="input-group-addon">+</span>{input}</div>',
                'inputOptions' => [
                    'placeholder' => $model->getAttributeLabel('last_name') . ' *',
                    'class' => 'form-control'
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-sm-6">
            <?= $form->field($model, 'description', [
                'template' => '<div class="input-group"><span class="input-group-addon">+</span>{input}</div>',
                'inputOptions' => [
                    'placeholder' => $model->getAttributeLabel('description'),
                    'class' => 'form-control',
                    'minlength' => '5'
                ],
            ])->textArea(['rows' => '3'])->label(false);
            ?>
        </div>

    </div>


    <hr class="line-address"><br>

    <div class="row">
        <div class="col-sm-8">
            <?= $form->field($model, 'street', [
                'template' => '<div class="input-group"><span class="input-group-addon">+</span>{input}</div>',
                'inputOptions' => [
                    'placeholder' => $model->getAttributeLabel('street') . ' *',
                    'class' => 'form-control'
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-sm-4">
            <?= $form->field($model, 'house_number', [
                'template' => '<div class="input-group"><span class="input-group-addon">+</span>{input}</div>',
                'inputOptions' => [
                    'placeholder' => $model->getAttributeLabel('house_number') . ' *',
                    'class' => 'form-control'
                ],
            ])->label(false);
            ?>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'city', [
                'template' => '<div class="input-group"><span class="input-group-addon">+</span>{input}</div>',
                'inputOptions' => [
                    'placeholder' => $model->getAttributeLabel('city') . ' *',
                    'class' => 'form-control'
                ],
            ])->label(false);
            ?>
        </div>

        <div class="col-sm-6">
            <?= $form->field($model, 'zip', [
                'template' => '<div class="input-group"><span class="input-group-addon">+</span>{input}</div>',
                'inputOptions' => [
                    'placeholder' => $model->getAttributeLabel('zip') . ' *',
                    'class' => 'form-control'
                ],
            ])->label(false);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 col-md-offset-10">
            <?= \yii\bootstrap\Html::submitButton('Save', ['class' => 'btn btn-success']); ?>
        </div>
    </div>
    <?php $form->end(); ?>
</div>
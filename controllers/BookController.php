<?php

namespace app\controllers;

use Yii;
use app\models\Book;
use yii\web\Controller;

class BookController extends Controller
{
    public function actionIndex()
    {
        $model = new Book();

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}

<?php

namespace app\controllers;

use app\models\UserBook;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

use app\models\User;
use app\models\Book;

class LendController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'lend-book' => ['post'],
                    'validate-lend-book' => ['get'],
                ],
            ],
        ];
    }

    public function actionLendBook($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => (string) $model->_id]);
        }elseif (Yii::$app->request->isAjax) {

            return $this->renderAjax('_form', [
                'model' => $model
            ]);
        } else {

            return $this->render('_form', [
                'model' => $model
            ]);
        }
    }

    public function actionValidateLendBook()
    {
        $model = new UserBook();
        $request = \Yii::$app->getRequest();

        if ($request->isPost && $model->load($request->post())) {
            // here should check No of books per user in a separate function.

            \Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($model);
        }
    }

    public function actionSave()
    {
        $model = new UserBook();
        $request = \Yii::$app->getRequest();

        if ($request->isPost && $model->load($request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ['success' => $model->save()];
        }

        // return
    }
}
<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use yii\web\Controller;
use yii\widgets\ActiveForm;
use yii\web\NotFoundHttpException;

use app\models\UserBook;

class LendController extends Controller
{
    /**
     * @return array
     */
    public function actionSave()
    {
        $model = new UserBook();

        $request = Yii::$app->getRequest();
        if ($request->isPost) {
            if ($model->lendBook($request->post())) {
                $response = Yii::$app->response;
                $response->format = Response::FORMAT_JSON;

                return $response->data = [
                    'result' => 'success',
                ];
            }
        }
    }

    /**
     * @return array
     * @throws NotFoundHttpException
     */
    public function actionValidate()
    {
        if (!Yii::$app->request->isAjax) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $model = new UserBook();

        $request = \Yii::$app->getRequest();

        if ($request->isPost && $model->load($request->post())) {

            if ($model->hasMaxLend(Yii::$app->request->post('UserBook[user_id]'))) {
                $response = Yii::$app->response;
                $response->format = Response::FORMAT_JSON;

                return $response->data = [
                    'result' => 'Exceed maximum limit',
                ];
            }

            return ActiveForm::validate($model);
        }
    }
}
<?php

namespace app\controllers;

use app\models\User;
use app\models\Book;
use app\models\UserBook;
use app\models\UserModel;
use yii\data\Pagination;

class UserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new UserModel();

        $query = UserModel::find();
        $queryCount = clone $query;
        $pagination = new Pagination(['totalCount' => $queryCount->count()]);
        $users = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'model' => $model,
            'users' => $users,
            'pagination' => $pagination,
        ]);
    }

    public function actionLend($id) {
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

    public function actionValidate()
    {
        $model = new MyModel();
        $request = \Yii::$app->getRequest();
        if ($request->isPost && $model->load($request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

    public function actionSave()
    {
        $model = new MyModel();
        $request = \Yii::$app->getRequest();
        if ($request->isPost && $model->load($request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ['success' => $model->save()];
        }
        return $this->renderAjax('registration', [
            'model' => $model,
        ]);
    }

}

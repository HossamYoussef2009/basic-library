<?php

namespace app\controllers;

use app\models\User;
use app\models\Book;
use app\models\UserBook;
use app\models\UserModel;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

class UserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = UserModel::find();
        $queryCount = clone $query;
        $pagination = new Pagination(['totalCount' => $queryCount->count()]);
        $users = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $availableBooksItems = ArrayHelper::map(
            Book::find()->active()->all(),
            'id',
            'title'
        );

        return $this->render('index', [
            'model' => new UserModel(),
            'users' => $users,
            'pagination' => $pagination,
            'books_model' => new UserBook(),
            'books_items' => $availableBooksItems
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionSave($id) {
        $model = new UserModel();

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

    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $response = Yii::$app->response;
            $response->format = Response::FORMAT_JSON;

            return $response->data = [
                'result' => 'success',
            ];
        } else {
            // Error Resposnse
        }
    }

    public function actionValidate($id = null)
    {
        if (!Yii::$app->request->isAjax) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        if ($id === null) {
            $model = new Student();
        } else {
            $model = $this->findModel($id);
        }

        if ($model->load(Yii::$app->request->post())) {
            $response = Yii::$app->response;
            $response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($model);
        }
    }

    /**
     * @param integer $id
     * @return UserModel
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace app\controllers;

use app\models\UploadForm;
use Yii;
use yii\web\Response;
use yii\web\Controller;
use yii\data\Pagination;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;
use yii\web\NotFoundHttpException;

use app\models\Book;
use app\models\UserBook;
use app\models\UserModel;

class UserController extends Controller
{
    public function actionIndex()
    {
        $bookModel = new Book();

        $query = UserModel::find();
        $queryCount = clone $query;
        $pagination = new Pagination(['totalCount' => $queryCount->count()]);
        $users = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'model' => new UserModel(),
            'users' => $users,
            'pagination' => $pagination,
            'books_model' => new UserBook(),
            'books_items' => $bookModel->getBooksList()
        ]);
    }

    /**
     * @return array
     */
    public function actionSave()
    {
        $model = new UserModel();

        $request = Yii::$app->getRequest();
        if ($request->isPost && $model->load($request->post())) {

            $uploadFile = new UploadForm();

            $uploadFile->photo = UploadedFile::getInstance($uploadFile, 'photo');

            if ($uploadFile->validate()) {
                $uploadFile->photo->saveAs('uploads/images/user/' . $uploadFile->photo->baseName . '.' . $uploadFile->photo->extension);
//                $uploadFile->upload();
                $model->photo = $uploadFile->photo->baseName . '.' . $uploadFile->photo->extension;
            }

            if ($model->save()) {
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
        if (!Yii::$app->request->isPost) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $model = new UserBook();

        $request = \Yii::$app->getRequest();

        if ($request->isPost && $model->load($request->post())) {

            $response = Yii::$app->response;
            $response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($model);
        }
    }
}

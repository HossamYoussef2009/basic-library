<?php

namespace app\repositories;

use Yii;


class UserQuery
{
    /**
     * @return mixed
     */
    public function paginateAllUsers()
    {
        $query = UserModel::find();
        $queryCount = clone $query;
        $pagination = new Pagination(['totalCount' => $queryCount->count()]);

        return $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
    }
}
<?php

namespace app\repositories;

use Yii;
use \yii\db\ActiveQuery;

class BookQuery extends ActiveQuery
{
    /**
     * @param int $versions
     * @return $this
     */
    public function active($versions = 1)
    {
        return $this->andWhere('versions >= :versions', [':versions' => $versions]);
    }
}

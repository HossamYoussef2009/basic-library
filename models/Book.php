<?php

namespace app\models;

use app\repositories\BookQuery;
use Yii;

/**
 * This is the model class for table "book".
 *
 * @property integer $id
 * @property string $title
 * @property string $author
 * @property integer $versions
 *
 * @property UserBook[] $userBooks
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }

    public static function find()
    {
        return new BookQuery(get_called_class());
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'author'], 'required'],
            [['versions'], 'integer'],
            [['title', 'author'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'author' => 'Author',
            'versions' => 'Versions',
        ];
    }

    /**
     * @return $this
     */
    public function getUsers()
    {
        return $this->hasMany(UserModel::className(), ['id' => 'user_id'])
            ->viaTable('user_book', ['book_id' => 'id']);
    }
}

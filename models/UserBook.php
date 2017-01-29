<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_book".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $book_id
 * @property integer $status
 * @property string $created_at
 *
 * @property Book $book
 * @property UserModel $user
 */
class UserBook extends \yii\db\ActiveRecord
{
    static $LEND_LIMIT = 8;
    static $LEND_STATUS_ACTIVE = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'book_id'], 'required'],
            //['user_id', 'unique', 'targetAttribute' => 'book_id'],
            [['user_id', 'book_id', 'status'], 'integer'],
            [['created_at'], 'safe'],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserModel::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'book_id' => 'Book ID',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserModel::className(), ['id' => 'user_id']);
    }

    public function lendBook($data)
    {
        if (! $this->hasMaxLend($data['UserBook']['user_id'])) {
        $this->triggerBooksVersions($data['UserBook']['book_id']);

            $userBook = new UserBook();
            $userBook->load($data);
            $userBook->status = $this::$LEND_STATUS_ACTIVE;

            return $userBook->save();
        }

        return false;
    }

    public function hasMaxLend($userId)
    {
        $recordsCount = UserBook::find()
            ->where([
                'user_id' => $userId,
                'status' => UserBook::$LEND_STATUS_ACTIVE,
            ])
            ->count();

        return ($recordsCount < $this::$LEND_LIMIT) ? false: true;
    }

    protected function triggerBooksVersions($bookId)
    {
        Yii::$app->db->createCommand("UPDATE book SET versions=versions-1 WHERE id=$bookId ")->execute();
    }

}

<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $salutation
 * @property string $title
 * @property string $first_name
 * @property string $last_name
 * @property string $city
 * @property string $zip
 * @property string $street
 * @property string $house_number
 * @property string $photo
 * @property string $description
 * @property string $registered_at
 *
 * @property UserBook[] $userBooks
 */
class UserModel extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $photo;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'first_name', 'last_name', 'city', 'street', 'zip', 'house_number'], 'required'],
            [['description'], 'string', 'min' => 8],
            [['registered_at'], 'safe'],
            [['salutation', 'title', 'first_name', 'last_name', 'city', 'street', 'photo'], 'string', 'max' => 100],
            [['photo'], 'string', 'max' => 128],
            [['zip', 'house_number'], 'string', 'max' => 16],
        ];
    }

    /**
     * @return int
     */
    public function getBooksCount()
    {
        return $this->getBooks()->count();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['id' => 'book_id'])
            ->viaTable('user_book', ['user_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'salutation' => 'Salutation',
            'title' => 'Title',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'city' => 'City',
            'zip' => 'Zip',
            'street' => 'Street',
            'house_number' => 'House Number',
            'photo' => 'Photo',
            'description' => 'Description',
            'registered_at' => 'Registered At',
        ];
    }
}

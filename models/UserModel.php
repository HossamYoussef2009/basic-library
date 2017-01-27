<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property integer $role
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
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'password'], 'required'],
            [['role'], 'integer'],
            [['description'], 'string'],
            [['registered_at'], 'safe'],
            [['login', 'salutation', 'title', 'first_name', 'last_name', 'city', 'street'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 255],
            [['zip', 'house_number'], 'string', 'max' => 16],
            [['photo'], 'string', 'max' => 128],
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

    public function upload()
    {
        if (!isset($this->photo)) {
            return true;
        }
        $dir =  'uploads/img/authors/'. $this->getAttribute('id');
        if ($this->validate()) {
            if (file_exists($dir)) {// Check if file exists ->
                $files = scandir($dir);// get all folder files ->
                foreach ($files as $file) { //delete files if it is not "." or ".."(delete user photo)
                    if ($file != "." && $file != "..") {
                        unlink($dir."/".$file);
                    }
                }/////////////////////////////////////////////////////////////////////////////////////
            } else {
                mkdir($dir, 0777, true);
            }
            $this->photo->saveAs($dir. '/'. $this->photo->baseName . '.' . $this->photo->extension);
            $this->photo_path = $dir. '/'. $this->photo->baseName . '.' . $this->photo->extension;
            $this->photo = null;
            if (!$this->save()) {
                return false;
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'role' => 'Role',
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

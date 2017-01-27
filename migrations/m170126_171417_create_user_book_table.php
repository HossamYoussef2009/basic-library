<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_book`.
 */
class m170126_171417_create_user_book_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_book', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'book_id' => $this->integer(),
            'status' => $this->boolean()->defaultValue(0)->notNull(),
            'created_at' => $this->timestamp(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-user_book-user_id',
            'user_book',
            'user_id'
        );

        // creates index for column `book_id`
        $this->createIndex(
            'idx-user_book-book_id',
            'user_book',
            'book_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user_book-user_id',
            'user_book',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // add foreign key for table `book`
        $this->addForeignKey(
            'fk-user_book-book_id',
            'user_book',
            'book_id',
            'book',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_book');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `book`.
 */
class m170126_165558_create_book_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('book', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100)->notNull(),
            'author' => $this->string(100)->notNull(),
            'versions' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('book');
    }
}

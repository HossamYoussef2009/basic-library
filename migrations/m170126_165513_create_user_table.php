<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m170126_165513_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'login' => $this->string(100)->notNull(),
            'password' => $this->string()->notNull(),
            'role' => $this->integer(1)->defaultValue(10),
            'salutation' => $this->string(100),
            'title' => $this->string(100),
            'first_name' => $this->string(100),
            'last_name' => $this->string(100),
            'city' => $this->string(100),
            'zip' => $this->string(16),
            'street' => $this->string(100),
            'house_number' => $this->string(16),
            'photo' => $this->string(128),
            'description' => 'text',
            'registered_at' => $this->timestamp(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}

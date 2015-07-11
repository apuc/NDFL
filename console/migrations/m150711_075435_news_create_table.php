<?php

use yii\db\Schema;
use yii\db\Migration;

class m150711_075435_news_create_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('news', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . '(255) NOT NULL',
            'tags' => Schema::TYPE_STRING . '(255) NOT NULL',
            'text' => Schema::TYPE_TEXT . ' NOT NULL',
            'dt_add' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'status' => Schema::TYPE_INTEGER . '(2) NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('news');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}

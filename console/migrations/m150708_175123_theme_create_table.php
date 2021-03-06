<?php

use yii\db\Schema;
use yii\db\Migration;

    /**
     * Class m150708_175123_theme_create_table
     *
     * это разговор
     */

class m150708_175123_theme_create_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('theme', [
            'id'          => Schema::TYPE_PK,
            'user_id'     => Schema::TYPE_INTEGER . ' NOT NULL',
            'category_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'title'       => Schema::TYPE_STRING . '(250) NOT NULL',
            'is_visible'  => Schema::TYPE_INTEGER . ' NOT NULL',
            'date'        => Schema::TYPE_INTEGER . '(10)',
        ], $tableOptions);

        $this->addForeignKey('user_theme_fk', 'theme', 'user_id', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('category_theme_fk', 'theme', 'category_id', 'category', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('user_theme_fk', 'theme');
        $this->dropForeignKey('category_theme_fk', 'theme');

        $this->dropTable('theme');
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

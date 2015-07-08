<?php

use yii\db\Schema;
use yii\db\Migration;

class m150708_175649_subscriber extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('subscriber', [
            'id'        => Schema::TYPE_PK,
            'user_id'     => Schema::TYPE_INTEGER . ' NOT NULL',
            'theme_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->addForeignKey('user_subscriber_fk', 'subscriber', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('theme_subscriber_fk', 'subscriber', 'theme_id', 'theme', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('user_subscriber_fk', 'subscriber');
        $this->dropForeignKey('theme_subscriber_fk', 'subscriber');

        $this->dropTable('subscriber');
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

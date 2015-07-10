<?php

use yii\db\Schema;
use yii\db\Migration;

class m150710_091507_review_create_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('review', [
            'id' => Schema::TYPE_PK,
            'text' => Schema::TYPE_TEXT . ' NOT NULL',
            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'date' => Schema::TYPE_INTEGER . '(10) NOT NULL',
        ], $tableOptions);

        $this->addForeignKey('user_review_fk', 'review', 'user_id', 'user', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('user_review_fk', 'review');

        $this->dropTable('review');
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

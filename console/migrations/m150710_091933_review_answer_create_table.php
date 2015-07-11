<?php

use yii\db\Schema;
use yii\db\Migration;

class m150710_091933_review_answer_create_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('review_answer', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'review_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'text' => Schema::TYPE_TEXT . ' NOT NULL',
            'date' => Schema::TYPE_INTEGER . '(10) NOT NULL',
        ], $tableOptions);

        $this->addForeignKey('review_answer_fk', 'review_answer', 'review_id', 'review', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('user_review_answer_fk', 'review_answer', 'user_id', 'user', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('review_answer_fk', 'review_answer');
        $this->dropForeignKey('user_review_answer_fk', 'review_answer');

        $this->dropTable('review_answer');
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

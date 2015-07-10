<?php

use yii\db\Schema;
use yii\db\Migration;

class m150708_180432_answer_create_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('answer', [
            'id'       => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'question_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'text'     => Schema::TYPE_TEXT . ' NOT NULL',
            'date'     => Schema::TYPE_INTEGER . '(10) NOT NULL',
        ], $tableOptions);

        $this->addForeignKey('user_answer_fk', 'answer', 'user_id', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('question_answer_fk', 'answer', 'question_id', 'question', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('user_answer_fk', 'answer');
        $this->dropForeignKey('question_answer_fk', 'answer');

        $this->dropTable('answer');
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

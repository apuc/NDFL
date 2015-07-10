<?php

use yii\db\Schema;
use yii\db\Migration;

class m150708_181328_rating_create_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('rating', [
            'id'       => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'answer_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->addForeignKey('user_rating_fk', 'rating', 'user_id', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('answer_rating_fk', 'rating', 'answer_id', 'answer', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('user_rating_fk', 'rating');
        $this->dropForeignKey('answer_rating_fk', 'rating');

        $this->dropTable('rating');
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

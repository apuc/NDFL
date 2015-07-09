<?php

    use yii\db\Schema;
    use yii\db\Migration;

    class m150708_180213_question extends Migration
    {
        public function up()
        {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
            }

            $this->createTable('question', [
                'id'       => Schema::TYPE_PK,
                'text'     => Schema::TYPE_TEXT . ' NOT NULL',
                'theme_id' => Schema::TYPE_INTEGER . ' NOT NULL',
                'data'     => Schema::TYPE_INTEGER . '(10) NOT NULL',
            ], $tableOptions);

            $this->addForeignKey('theme_question_fk', 'question', 'theme_id', 'theme', 'id', 'CASCADE', 'CASCADE');
        }

        public function down()
        {
            $this->dropForeignKey('theme_question_fk', 'question');

            $this->dropTable('question');
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

<?php

    use yii\db\Schema;
    use yii\db\Migration;

    class m150708_173834_category extends Migration
    {
        public function up()
        {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
            }

            $this->createTable('category', [
                'id'        => Schema::TYPE_PK,
                'title'     => Schema::TYPE_STRING . '(250) NOT NULL',
                'parent_id' => Schema::TYPE_INTEGER . ' NULL',
                'level'     => Schema::TYPE_INTEGER,
            ], $tableOptions);

            $this->addForeignKey('category_category_fk', 'category', 'parent_id', 'category', 'id', 'RESTRICT', 'CASCADE');
        }

        public function down()
        {
            $this->dropForeignKey('category_category_fk', 'category');

            $this->dropTable('category');
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

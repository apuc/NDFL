<?php

    use yii\db\Schema;
    use yii\db\Migration;

    class m130524_201442_user extends Migration
    {
        public function up()
        {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
            }

            $this->createTable('user', [
                'id'         => Schema::TYPE_PK,
                'email'      => Schema::TYPE_STRING . ' NOT NULL',
                'password'   => Schema::TYPE_STRING . ' NOT NULL',
                'status'     => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
                'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                'surname'    => Schema::TYPE_STRING . '(40)',
                'name'       => Schema::TYPE_STRING . '(40)',
                'patronymic' => Schema::TYPE_STRING . '(40)',
            ], $tableOptions);

            $this->createIndex('email_password', 'user', ['email', 'password'], true);
        }

        public function down()
        {
            $this->dropIndex('email_password', 'user');
            $this->dropTable('user');
        }
    }

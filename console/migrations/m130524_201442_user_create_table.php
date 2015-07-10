<?php

    use yii\db\Schema;
    use yii\db\Migration;

    class m130524_201442_user_create_table extends Migration
    {
        public function up()
        {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
            }

            $this->createTable('user', [
                'id'         => Schema::TYPE_PK,
                'email'      => Schema::TYPE_STRING . '(80) NOT NULL',
                'password'   => Schema::TYPE_STRING . '(128) NOT NULL',
                'status'     => Schema::TYPE_SMALLINT . '(2) NOT NULL DEFAULT 1',
                'salt'       => Schema::TYPE_STRING . '(64)',
                'created_at' => Schema::TYPE_INTEGER . '(10) NOT NULL',
                'updated_at' => Schema::TYPE_INTEGER . '(10) NOT NULL',
                'surname'    => Schema::TYPE_STRING . '(40)',
                'name'       => Schema::TYPE_STRING . '(40)',
                'patronymic' => Schema::TYPE_STRING . '(40)',
                'image'      => Schema::TYPE_STRING,
                'user_type'  => Schema::TYPE_INTEGER . '(2)',
            ], $tableOptions);

            $this->createIndex('email_password', 'user', ['email', 'password'], true);

            $salt = sha1(time() . '76s3d');

            $this->insert("user", [
                'email'      => 'admin@ndfl.ru',
                'password'   => hash_hmac('sha512', 'admin', $salt),
                'name'       => 'Иванов',
                'salt'       => $salt,
                'surname'    => 'Иван',
                'patronymic' => 'Иваныч',
                'status'     => \common\constants\Status::ACTIVE,
                'user_type'  => \common\constants\UserType::ADMINISTRATOR,
            ]);
        }

        public function down()
        {
            $this->dropIndex('email_password', 'user');
            $this->dropTable('user');
        }
    }

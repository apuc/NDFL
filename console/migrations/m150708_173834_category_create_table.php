<?php

    use yii\db\Schema;
    use yii\db\Migration;

    class m150708_173834_category_create_table extends Migration
    {
        public function up()
        {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
            }

            $this->createTable('category', [
                'id'            => Schema::TYPE_PK,
                'root'          => Schema::TYPE_INTEGER . '(11) DEFAULT NULL',
                'lft'           => Schema::TYPE_INTEGER . '(1) NOT NULL',
                'rgt'           => Schema::TYPE_INTEGER . '(1) NOT NULL',
                'lvl'           => Schema::TYPE_SMALLINT . '(5) NOT NULL',
                'name'          => Schema::TYPE_STRING . '(255) NOT NULL',
                'icon'          => Schema::TYPE_STRING . '(255) DEFAULT NULL',
                'icon_type'     => Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT 1',
                'active'        => Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT TRUE',
                'selected'      => Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT FALSE',
                'disabled'      => Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT FALSE',
                'readonly'      => Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT FALSE',
                'visible'       => Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT TRUE',
                'collapsed'     => Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT FALSE',
                'movable_u'     => Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT TRUE',
                'movable_d'     => Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT TRUE',
                'movable_l'     => Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT TRUE',
                'movable_r'     => Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT TRUE',
                'removable'     => Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT TRUE',
                'removable_all' => Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT FALSE',
            ], $tableOptions);

            $this->createIndex('category_root_index', 'category', 'root');
            $this->createIndex('category_lft_index', 'category', 'lft');
            $this->createIndex('category_rgt_index', 'category', 'rgt');
            $this->createIndex('category_lvl_index', 'category', 'lvl');
            $this->createIndex('category_active_index', 'category', 'active');
        }

        public function down()
        {
            $this->dropIndex('category_root_index', 'category');
            $this->dropIndex('category_lft_index', 'category');
            $this->dropIndex('category_rgt_index', 'category');
            $this->dropIndex('category_lvl_index', 'category');
            $this->dropIndex('category_active_index', 'category');

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

<?php

    use yii\db\Schema;
    use yii\db\Migration;

    class m150710_130621_category_delete_columns extends Migration
    {
        public function up()
        {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
            }

            $this->dropIndex('category_root_index', 'category');
            $this->dropIndex('category_lft_index', 'category');
            $this->dropIndex('category_rgt_index', 'category');
            $this->dropIndex('category_lvl_index', 'category');
            $this->dropIndex('category_active_index', 'category');

            $this->dropColumn('category', 'root');
            $this->dropColumn('category', 'icon');
            $this->dropColumn('category', 'icon_type');
            $this->dropColumn('category', 'active');
            $this->dropColumn('category', 'selected');
            $this->dropColumn('category', 'disabled');
            $this->dropColumn('category', 'readonly');
            $this->dropColumn('category', 'visible');
            $this->dropColumn('category', 'collapsed');
            $this->dropColumn('category', 'movable_u');
            $this->dropColumn('category', 'movable_d');
            $this->dropColumn('category', 'movable_l');
            $this->dropColumn('category', 'movable_r');
            $this->dropColumn('category', 'removable');
            $this->dropColumn('category', 'removable_all');

            $this->addColumn('category', 'tree', \yii\db\mysql\Schema::TYPE_INTEGER);
            $this->addColumn('category', 'parent_id', \yii\db\mysql\Schema::TYPE_INTEGER);
        }

        public function down()
        {
            $this->addColumn('category', 'root', Schema::TYPE_INTEGER . '(11) DEFAULT NULL');
            $this->addColumn('category', 'icon', Schema::TYPE_STRING . '(255) DEFAULT NULL');
            $this->addColumn('category', 'icon_type', Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT 1');
            $this->addColumn('category', 'active', Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT TRUE');
            $this->addColumn('category', 'selected', Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT FALSE');
            $this->addColumn('category', 'disabled', Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT FALSE');
            $this->addColumn('category', 'readonly', Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT FALSE');
            $this->addColumn('category', 'visible', Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT TRUE');
            $this->addColumn('category', 'collapsed', Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT FALSE');
            $this->addColumn('category', 'movable_u', Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT TRUE');
            $this->addColumn('category', 'movable_d', Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT TRUE');
            $this->addColumn('category', 'movable_l', Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT TRUE');
            $this->addColumn('category', 'movable_r', Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT TRUE');
            $this->addColumn('category', 'removable', Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT TRUE');
            $this->addColumn('category', 'removable_all', Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT FALSE');

            $this->createIndex('category_root_index', 'category', 'root');
            $this->createIndex('category_lft_index', 'category', 'lft');
            $this->createIndex('category_rgt_index', 'category', 'rgt');
            $this->createIndex('category_lvl_index', 'category', 'lvl');
            $this->createIndex('category_active_index', 'category', 'active');

            $this->dropColumn('category', 'tree');
            $this->dropColumn('category', 'parent_id');
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

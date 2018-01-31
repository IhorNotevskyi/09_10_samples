<?php

namespace console\migrations;

use components\db\Migration;

/**
 * Class M1517429663_create_categories_table
 * @package console\migrations
 */
class M1517429663_create_categories_table extends Migration
{
    public function up()
    {
        $this->createTable('categories', [
            $this->integer('id', 11)->autoIncrement()->primaryKey(),
            $this->varchar('title', 255)->notNull()
        ]);
    }
    
    public function down()
    {
        $this->dropTable('categories');
    }
}
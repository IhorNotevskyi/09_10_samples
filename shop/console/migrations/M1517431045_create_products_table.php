<?php

namespace console\migrations;

use components\db\Migration;

/**
 * Class M1517431045_create_products_table
 * @package console\migrations
 */
class M1517431045_create_products_table extends Migration
{
    public function up()
    {
        $this->createTable('products', [
            $this->integer('id', 11)->autoIncrement()->primaryKey(),
            $this->varchar('title', 255)->notNull(),
            $this->text('description'),
            $this->decimal('price')
        ]);
    }
    
    public function down()
    {
        $this->dropTable('products');
    }
}
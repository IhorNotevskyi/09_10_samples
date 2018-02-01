<?php

namespace console\migrations;

use components\db\Migration;
        
/**
 * Class M1517515908_add_parent_category_column
 * @package console\migrations
 */
class M1517515908_add_parent_category_column extends Migration
{
    public function up()
    {
        $this->addColumn('categories', $this->integer('parent_category_id', 11), 'id');
        $this->addForeignKey(
            'fk-categories-parent_category_id-categories-id',
            'categories',
            'parent_category_id',
            'categories',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }
    
    public function down()
    {
        $this->dropForeignKey('fk-categories-parent_category_id-categories-id', 'categories');
        $this->dropColumn('categories', 'parent_category_id');
    }
}
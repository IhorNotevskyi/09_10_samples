<?php

namespace console\migrations;

use components\db\Migration;
        
/**
 * Class M1517518989_add_category_title_unique_index
 * @package console\migrations
 */
class M1517518989_add_category_title_unique_index extends Migration
{
    public function up()
    {
        $this->createIndex('idx-unique-categories-title', 'categories', 'title', true);
    }
    
    public function down()
    {
        $this->dropIndex('idx-unique-categories-title', 'categories');
    }
}
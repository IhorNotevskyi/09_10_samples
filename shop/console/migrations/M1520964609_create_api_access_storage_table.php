<?php

namespace console\migrations;

use components\db\Migration;
        
/**
 * Class M1520964609_create_api_access_storage_table
 * @package console\migrations
 */
class M1520964609_create_api_access_storage_table extends Migration
{
    const TABLE = 'api_access_storage';

    public function up()
    {
        $this->createTable(self::TABLE, [
            $this->integer('id', 11)->autoIncrement()->primaryKey(),
            $this->varchar('user_key', 255)
        ]);
    }
    
    public function down()
    {
        $this->dropTable(self::TABLE);
    }
}
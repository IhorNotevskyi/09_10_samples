<?php

namespace console\migrations;

use components\db\Migration;
        
/**
 * Class M1517520704_create_users_table
 * @package console\migrations
 */
class M1517520704_create_users_table extends Migration
{
    public function up()
    {
        $this->createTable('users', [
            $this->integer('id', 11)->autoIncrement()->primaryKey(),
            $this->varchar('name', 255)->notNull(),
            $this->varchar('login', 255)->notNull(),
            $this->varchar('password', 32)->notNull(),
        ]);
        $this->createIndex('idx-users-login-unique', 'users', 'login', true);
    }
    
    public function down()
    {
        $this->dropIndex('idx-users-login-unique', 'users');
        $this->dropTable('users');
    }
}
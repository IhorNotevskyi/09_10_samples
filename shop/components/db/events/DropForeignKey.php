<?php

namespace components\db\events;

use components\db\Command;

/**
 * Class DropForeignKey
 * @package components\db\events
 */
class DropForeignKey extends Command
{
    /**
     * @var string
     */
    private $key;

    /**
     * @param string $key
     * @return DropForeignKey
     */
    public function key($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @param string $table
     * @return DropForeignKey
     */
    public function table($table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @return string
     */
    public function build()
    {
        return "ALTER TABLE {$this->table} DROP FOREIGN KEY `{$this->key}`";
    }
}
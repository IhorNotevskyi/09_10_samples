<?php

namespace components\db;

/**
 * Class DropTable
 * @package components\db
 */
class DropTable extends Command
{
    /**
     * @param string $table
     * @return DropTable
     */
    public function drop($table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @return string
     */
    public function build()
    {
        return "DROP TABLE {$this->table}";
    }
}
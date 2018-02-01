<?php

namespace components\db\events;

use components\db\Command;

/**
 * Class DropTable
 * @package components\db\events
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
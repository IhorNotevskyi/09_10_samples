<?php

namespace components\db\events;

use components\db\Command;

/**
 * Class Delete
 * @package components\db\events
 */
class Delete extends Command
{
    /**
     * @return Delete
     */
    public function delete()
    {
        return $this;
    }


    /**
     * @return string
     */
    public function build()
    {
        $conditions = $this->conditions();
        $sql = "DELETE FROM {$this->table}{$conditions}{$this->limit}";

         return $sql;
    }
}
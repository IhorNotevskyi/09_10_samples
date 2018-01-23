<?php

namespace components\db;

/**
 * Class Delete
 * @package components\db
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


    public function build()
    {
        $sql = "DELETE FROM {$this->table}";
        foreach ($this->where as $row) {
            $sql .= " WHERE {$row}";
        }
        $sql .=$this->limit;
         return $sql;
    }
}
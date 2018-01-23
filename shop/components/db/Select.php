<?php

namespace components\db;

use components\console\Application;
use PDO;

/**
 * Class Select
 * @package components\db
 */
class Select extends Command
{
    /**
     * @param array $fields
     * @return Select
     */
    public function select(array $fields)
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @return string
     */
    function build()
    {
        $fields = implode(', ', $this->fields);
        $sql = "SELECT {$fields} FROM {$this->table}";
        foreach ($this->where as $row) {
            $sql .= " WHERE {$row}";
        }

        return $sql;
    }

    /**
     * @return array
     */
    public function all()
    {
        $query = $this->execute();

        $rows = [];
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $rows[] = $row;
        }

        return $rows;
    }

    /**
     * @return array
     */
    public function one()
    {
        $query = $this->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @return \PDOStatement
     */
    public function execute()
    {
        $query = Application::getDb()->getConnection()->query($this->build(), PDO::FETCH_ASSOC);
        $query->execute();

        return $query;
    }
}

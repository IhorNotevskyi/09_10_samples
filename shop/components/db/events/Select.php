<?php

namespace components\db\events;

use components\db\Command;
use components\console\Application;
use PDO;

/**
 * Class Select
 * @package components\db\events
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
        $conditions = $this->conditions();
        return "SELECT {$fields} FROM {$this->table}{$conditions}{$this->orderBy}{$this->limit}";
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
    public function column()
    {
        return $this->execute()->fetchAll(PDO::FETCH_COLUMN);
    }

    /**
     * @return array
     */
    public function one()
    {
        return $this->execute()->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @return bool
     */
    public function exists()
    {
        return $this->execute()->rowCount() > 0;
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

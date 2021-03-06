<?php

namespace components\db\events;

use components\db\Command;
use components\db\FieldType;

/**
 * Class AddColumn
 * @package components\db\events
 */
class AddColumn extends Command
{
    /**
     * @var FieldType
     */
    private $column;

    /**
     * @var string
     */
    private $after;

    /**
     * @param FieldType $column
     * @return $this
     */
    public function column(FieldType $column)
    {
        $this->column = $column;
        return $this;
    }

    /**
     * @param string $after
     * @return AddColumn
     */
    public function after($after)
    {
        $this->after = $after;
        return $this;
    }

    /**
     * @param string $table
     * @return AddColumn
     */
    public function table($table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @return string
     */
    public function getAfter()
    {
        return $this->after ? " AFTER {$this->after}" : '';
    }

    /**
     * @return string
     */
    public function build()
    {
        return "ALTER TABLE {$this->table} ADD COLUMN {$this->column->build()}{$this->getAfter()}";
    }
}
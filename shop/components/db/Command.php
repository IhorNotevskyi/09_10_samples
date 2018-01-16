<?php

namespace components\db;
use components\console\Application;

/**
 * Class Command
 * @package components\db
 */
abstract class Command
{
    /**
     * @var array
     */
    protected $fields = [];

    /**
     * @var null|string
     */
    protected $table = null;

    /**
     * @var array
     */
    protected $where = [];

    /**
     * @var array
     */
    protected $andWhere = [];

    /**
     * @var array
     */
    protected $orWhere = [];

    /**
     * @var array
     */
    protected $join = [];

    /**
     * @return string
     */
    abstract function build();

    /**
     * @return int
     */
    public function execute()
    {
        return Application::getDb()->getConnection()->exec($this->build());
    }
}
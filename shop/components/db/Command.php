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

    /*
     * @var str
     */
    protected $orderBy;

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
     * @var string
     */
    protected $limit;

    /**
     * @return string
     */
    abstract function build();

    /**
     * @param array $condition
     * @return Command
     */
    public function where(array $condition)
    {
        $this->where[] = Condition::getCondition($condition);
        return $this;
    }

    /**
     * @param string $table
     * @return Command
     */
    public function from($table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @param string $field
     * @param int $order
     * @return Command
     */
    public function orderBy($field, $order = SORT_ASC)
    {
        $orderDirection = $order == SORT_ASC ? 'ASC' : 'DESC';
        $this->orderBy = " ORDER BY " . $field . " " . $orderDirection;
        return $this;
    }

    /**
     * @param int $amount
     * @return Command
     */
    public function limit($amount)
    {
        $this->limit = " LIMIT ". $amount;
        return $this;
    }

    /**
     * @return int
     * @throws \Exception
     */
    public function execute()
    {
        $result = Application::getDb()->getConnection()->exec($this->build());
        if (false === $result) {
            $error = Application::getDb()->getConnection()->errorInfo();
            $message = array_key_exists(2, $error) ? $error[2] : 'Undefinded DB error';

            throw new \Exception($message);
        }

        return $result;
    }

    /**
     * @param mixed $value
     * @return bool
     */
    protected function isNotString($value)
    {
        $notStrings = ['NULL'];
        return is_numeric($value) || in_array($value, $notStrings);
    }
}
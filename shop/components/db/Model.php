<?php

namespace components\db;

/**
 * Class Model
 * @package components\db
 */
class Model
{
    /**
     * @param array $fields
     * @return Select
     */
    public function select(array $fields)
    {
        return (new Query())->getBuilder(Query::SELECT)->select($fields);
    }

    /**
     * @param string $table
     * @param array $fields
     * @return int
     */
    public function insert($table, array $fields)
    {
        return (new Query())->getBuilder(Query::INSERT)->insert($fields)->into($table)->execute();
    }

    /**
     * @param string $table
     * @param array $conditions
     * @param null|int $limit
     * @return int
     */
    public function delete($table, array $conditions = [], $limit = null)
    {
        $query = (new Query())->getBuilder(Query::DELETE)->delete()->from($table)->where($conditions);
        if ($limit) {
            $query->limit($limit);
        }

        return $query->execute();
    }
}

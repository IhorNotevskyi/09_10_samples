<?php

namespace components\db;

use components\console\Application;
use exceptions\DbException;
use helpers\ArrayHelper;
use PDO;

/**
 * Class ActiveRecord
 * @package components\db
 */
abstract class ActiveRecord
{
    /**
     * @var string
     */
    private $primaryKey;

    /**
     * @var array
     */
    private $schema = [];

    /**
     * @var bool
     */
    private $isSelected = false;

    /**
     * @var array
     */
    private $attributes = [];

    public function __construct()
    {
        $this->primaryKey = $this->primaryKey();
        $this->schema = $this->schema();
    }

    /**
     * @param array $data
     */
    public function load(array $data)
    {
        foreach ($data as $key => $value) {
            if (in_array($key, $this->schema)) {
                $this->attributes[$key] = $value;
            }
        }
    }

    /**
     * @param mixed $recordId
     * @return static|null
     */
    public static function findOne($recordId)
    {
        $model = new static();

        $data = $model->getRow($recordId);
        if ($data) {
            $model->load($data);
            $model->isSelected = true;
            return $model;
        }

        return null;
    }

    /**
     * @param mixed $recordId
     * @return array
     */
    private function getRow($recordId)
    {
        /** @var Select $query */
        $query = (new Query())->getBuilder(Query::SELECT)
            ->select(['*'])
            ->from($this->tableName())
            ->where(['=', $this->primaryKey, $recordId]);
        return $query->one();
    }

    /**
     * @return bool
     */
    public function save()
    {
        if ($this->isNewRecord()) {
            $result = $this->insert();
        } else {
            $result = $this->update();
        }

        return $result;
    }

    /**
     * @return bool|string
     */
    private function insert()
    {
        $result = (bool)(new Query())
            ->getBuilder(Query::INSERT)
            ->insert($this->attributes)
            ->into($this->tableName())
            ->execute();

        if ($result) {
            $lastId = Application::getDb()->getConnection()->lastInsertId();
            $data = $this->getRow($lastId);
            $this->load($data);

            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    private function update()
    {
        return (bool)(new Query())
            ->getBuilder(Query::UPDATE)
            ->update($this->tableName())
            ->set($this->attributes)
            ->where(['=', $this->primaryKey, $this->attributes[$this->primaryKey]])
            ->execute();
    }

    /**
     * @return bool
     */
    public function delete()
    {
        $result = (bool)(new Query())
            ->getBuilder(Query::DELETE)
            ->from($this->tableName())
            ->where(['=', $this->primaryKey, $this->attributes[$this->primaryKey]])
            ->execute();

        if ($result) {
            $this->attributes = [];
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isNewRecord()
    {
        return false === $this->hasPrimaryKey() || false === $this->hasDuplicatedId();
    }

    /**
     * @return bool
     */
    private function hasPrimaryKey()
    {
        return array_key_exists($this->primaryKey, $this->attributes);
    }

    private function hasDuplicatedId()
    {
        return $this->isSelected || (bool)self::findOne($this->attributes[$this->primaryKey]);
    }

    /**
     * @return string
     */
    abstract public function tableName();

    /**
     * @return array|mixed|null
     * @throws DbException
     */
    private function primaryKey()
    {
        $sql = "SHOW KEYS FROM {$this->tableName()} WHERE Key_name = 'PRIMARY'";
        $statement = Application::getDb()->getConnection()->prepare($sql);
        $statement->execute();

        $primaryKey = ArrayHelper::getValue($statement->fetch(PDO::FETCH_ASSOC), 'Column_name');

        if (empty($primaryKey)) {
            throw new DbException("Table '{$this->tableName()}' must have primary key");
        }

        return $primaryKey;
    }

    /**
     * @return array
     */
    private function schema()
    {
        $sql = "SHOW COLUMNS FROM {$this->tableName()}";
        $statement = Application::getDb()->getConnection()->prepare($sql);
        $statement->execute();

        $schema = [];
        foreach ($statement->fetchAll(PDO::FETCH_ASSOC) as $column) {
            $schema[] = $column['Field'];
        }

        return $schema;
    }
}
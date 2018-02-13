<?php

namespace console\models;

use components\console\Application;
use components\db\events\Select;
use components\db\Expression;

/**
 * Class Migration
 * @package console\models
 */
class Migration extends \components\db\Migration
{
    /**
     * @return string
     */
    public function tableName()
    {
        return 'migrations';
    }

    public function init()
    {
        /** @var Select $isInitiated */
        $isInitiated = $this->select(['table_name'])->from('information_schema.tables')->where([
            ['=', 'table_schema', Application::getDb()->getDataBaseName()],
            ['=', 'table_name', $this->tableName()]
        ]);

        if (!$isInitiated->exists()) {
            $this->createTable($this->tableName(), [
                $this->integer('id', 11)->autoIncrement()->primaryKey(),
                $this->varchar('migration', 255),
                $this->timestamp('execution_time')->defaultValue(new Expression('CURRENT_TIMESTAMP'))
            ]);
        }
    }

    /**
     * @param null|int $limit
     * @return array
     */
    public function getLastExecutedMigrations($limit = null)
    {
        /** @var Select $migrations */
        $migrations = $this->select(['migration'])->from($this->tableName())->orderBy('id', SORT_DESC);
        if ($limit) {
            $migrations->limit($limit);
        }

        return $migrations->column();
    }

    /**
     * @param string $migration
     * @return int
     */
    public function saveMigration($migration)
    {
        return $this->insert($this->tableName(), ['migration' => $migration]);
    }

    /**
     * @param string $migration
     * @return int
     */
    public function revertMigration($migration)
    {
        return $this->delete($this->tableName(), [['=', 'migration', $migration]], 1);
    }
}

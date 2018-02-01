<?php

namespace components\db;

use InvalidArgumentException;

/**
 * Class Query
 * @package components\db
 */
class Query
{
    const CREATE_TABLE = 'create_table';
    const DROP_TABLE = 'drop_table';
    const ADD_COLUMN = 'add_column';
    const DROP_COLUMN = 'drop_column';
    const ADD_FOREIGN_KEY = 'add_foreign_key';
    const DROP_FOREIGN_KEY = 'drop_foreign_key';
    const CREATE_INDEX = 'create_index';
    const DROP_INDEX = 'drop_index';
    const INSERT = 'insert';
    const SELECT = 'select';
    const UPDATE = 'update';
    const DELETE = 'delete';

    /**
     * @var array
     */
    private $classesMap = [
        self::CREATE_TABLE => 'components\db\events\CreateTable',
        self::DROP_TABLE => 'components\db\events\DropTable',
        self::ADD_COLUMN => 'components\db\events\AddColumn',
        self::DROP_COLUMN => 'components\db\events\DropColumn',
        self::ADD_FOREIGN_KEY => 'components\db\events\AddForeignKey',
        self::DROP_FOREIGN_KEY => 'components\db\events\DropForeignKey',
        self::CREATE_INDEX => 'components\db\events\CreateIndex',
        self::DROP_INDEX => 'components\db\events\DropIndex',
        self::INSERT => 'components\db\events\Insert',
        self::SELECT => 'components\db\events\Select',
        self::UPDATE => 'components\db\events\Update',
        self::DELETE => 'components\db\events\Delete'
    ];

    /**
     * @param string $command
     * @throws InvalidArgumentException
     * @return Command
     */
    public function getBuilder($command)
    {
        if (array_key_exists($command, $this->classesMap)) {
            $commandClass = $this->classesMap[$command];
            return new $commandClass();
        }

        throw new InvalidArgumentException("Command '{$command}' is not allowed");
    }
}

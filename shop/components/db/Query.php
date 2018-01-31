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
    const INSERT = 'insert';
    const SELECT = 'select';
    const UPDATE = 'update';
    const DELETE = 'delete';

    /**
     * @param string $command
     * @throws InvalidArgumentException
     * @return Command|Insert|Select|Update|Delete|CreateTable|DropTable
     */
    public function getBuilder($command)
    {
        switch ($command) {
            case self::CREATE_TABLE:
                return new CreateTable();
            case self::DROP_TABLE:
                return new DropTable();
            case self::INSERT:
                return new Insert();
            case self::SELECT:
                return new Select();
            case self::UPDATE:
                return new Update();
            case self::DELETE:
                return new Delete();
            default:
                throw new InvalidArgumentException("Command '{$command}' is not allowed");
        }
    }
}

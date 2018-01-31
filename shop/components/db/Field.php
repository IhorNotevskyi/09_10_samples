<?php

namespace components\db;

use components\db\fields\Decimal;
use components\db\fields\Integer;
use components\db\fields\Text;
use components\db\fields\TimeStamp;
use components\db\fields\Varchar;
use InvalidArgumentException;

/**
 * Class Field
 * @package components\db
 */
class Field
{
    const INTEGER = 'int';
    const VARCHAR = 'varchar';
    const TIMESTAMP = 'timestamp';
    const TEXT = 'text';
    const DECIMAL = 'decimal';

    /**
     * @param $type
     * @return FieldType|Integer|TimeStamp|Varchar|Text|Decimal
     */
    public function getBuilder($type)
    {
        switch ($type) {
            case self::INTEGER:
                return new Integer();
            case self::VARCHAR:
                return new Varchar();
            case self::TIMESTAMP:
                return new TimeStamp();
            case self::TEXT:
                return new Text();
            case self::DECIMAL:
                return new Decimal();
            default:
                throw new InvalidArgumentException("Field type '{$type}' is not allowed");
        }
    }
}
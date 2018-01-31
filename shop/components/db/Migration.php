<?php

namespace components\db;

/**
 * Class Migration
 * @package components\db
 */
class Migration extends Model
{
    /**
     * @param string $name
     * @param array $fields
     * @return int
     */
    public function createTable($name, array $fields)
    {
        return (new Query())->getBuilder(Query::CREATE_TABLE)->create($name)->fields($fields)->execute();
    }

    /**
     * @param string $name
     * @return int
     */
    public function dropTable($name)
    {
        return (new Query())->getBuilder(Query::DROP_TABLE)->drop($name)->execute();
    }

    /**
     * @param string $name
     * @param int $length
     * @return FieldType|\components\db\fields\Integer
     */
    public function integer($name, $length)
    {
        return (new Field())->getBuilder(Field::INTEGER)->name($name)->length($length);
    }

    /**
     * @param string $name
     * @param int $length
     * @return FieldType|\components\db\fields\Varchar
     */
    public function varchar($name, $length)
    {
        return (new Field())->getBuilder(Field::VARCHAR)->name($name)->length($length);
    }

    /**
     * @param string $name
     * @return FieldType|\components\db\fields\TimeStamp
     */
    public function timestamp($name)
    {
        return (new Field())->getBuilder(Field::TIMESTAMP)->name($name);
    }

    /**
     * @param string $name
     * @return FieldType|\components\db\fields\Text
     */
    public function text($name)
    {
        return (new Field())->getBuilder(Field::TEXT)->name($name);
    }

    /**
     * @param $name
     * @param int $decimalSigns
     * @return FieldType|\components\db\fields\Decimal
     */
    public function decimal($name, $decimalSigns = 2)
    {
        return (new Field())->getBuilder(Field::DECIMAL)->name($name)->length($decimalSigns);
    }
}
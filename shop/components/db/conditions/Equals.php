<?php

namespace components\db\conditions;

use components\db\Condition;

/**
 * Class Equals
 * @package db\conditions
 */
class Equals extends Condition
{
    /**
     * @return string
     */
    public function getConditionString()
    {
        return "{$this->field} {$this->marker} '{$this->value}'";
    }
}
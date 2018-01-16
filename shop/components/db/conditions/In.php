<?php

namespace components\db\conditions;

use components\db\Condition;

class In extends Condition
{
    /**
     * @return string
     */
    public function getConditionString()
    {
        $options = "'" . implode("', '", $this->value) . "'";
        return "{$this->field} {$this->marker} ({$options})";
    }
}
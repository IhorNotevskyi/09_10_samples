<?php

namespace components\db\fields;

use components\db\FieldType;

/**
 * Class Integer
 * @package components\db\fields
 */
class Integer extends FieldType
{
    /**
     * @return string
     */
    public function build()
    {
        $field = "{$this->name} INT({$this->length})";
        if ($this->autoincrement) {
            $field .= ' auto_increment';
        }
        $field .= $this->getDefault();

        return $field;
    }
}

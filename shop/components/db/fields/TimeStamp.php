<?php

namespace components\db\fields;

use components\db\FieldType;

/**
 * Class TimeStamp
 * @package components\db\fields
 */
class TimeStamp extends FieldType
{
    /**
     * @return string
     */
    public function build()
    {
        $field = "{$this->name} TIMESTAMP{$this->getDefault()}";
        return $field;
    }
}

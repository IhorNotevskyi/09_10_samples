<?php

namespace components\db\fields;

use components\db\FieldType;

/**
 * Class Decimal
 * @package components\db\fields
 */
class Decimal extends FieldType
{
    /**
     * @return string
     */
    public function build()
    {
        return "{$this->name} DECIMAL({$this->length}){$this->getDefault()}";
    }
}

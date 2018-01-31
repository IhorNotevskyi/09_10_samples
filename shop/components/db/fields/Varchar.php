<?php

namespace components\db\fields;

use components\db\FieldType;

/**
 * Class Varchar
 * @package components\db\fields
 */
class Varchar extends FieldType
{
    /**
     * @return string
     */
    public function build()
    {
        return "{$this->name} VARCHAR({$this->length}){$this->getNotNull()}{$this->getDefault()}";
    }
}

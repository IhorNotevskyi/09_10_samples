<?php

namespace components\db\fields;

use components\db\FieldType;

/**
 * Class Text
 * @package components\db\fields
 */
class Text extends FieldType
{
    /**
     * @return string
     */
    public function build()
    {
        return "{$this->name} TEXT{$this->getDefault()}";
    }
}

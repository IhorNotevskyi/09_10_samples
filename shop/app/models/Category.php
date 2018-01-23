<?php

namespace app\models;

use components\db\ActiveRecord;

/**
 * Class Category
 * @package app\models
 */
class Category extends ActiveRecord
{
    /**
     * @return string
     */
    public function tableName()
    {
        return 'categories';
    }
}
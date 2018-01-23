<?php

namespace app\models;

use components\db\ActiveRecord;

/**
 * Class Product
 * @package app\models
 */
class Product extends ActiveRecord
{
    /**
     * @return string
     */
    public function tableName()
    {
        return 'products';
    }
}
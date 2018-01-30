<?php

namespace app\models;

use components\db\ActiveRecord;

/**
 * Class User
 * @package app\models
 */
class User extends ActiveRecord
{
    /**
     * @return string
     */
    public function tableName()
    {
        return 'users';
    }
}
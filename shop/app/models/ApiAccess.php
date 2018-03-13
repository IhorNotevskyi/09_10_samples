<?php

namespace app\models;

use components\db\ActiveRecord;

/**
 * Class ApiAccess
 * @package app\models
 * @property int $id
 * @property string $user_key
 */
class ApiAccess extends ActiveRecord
{
    /**
     * @return string
     */
    public function tableName()
    {
        return 'api_access_storage';
    }
}
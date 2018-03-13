<?php

namespace components\api;

use app\models\ApiAccess;
use components\Security;
use exceptions\NotAuthorisedException;
use helpers\RequestHelper;

/**
 * Class Controller
 * @package components\api
 */
abstract class Controller
{
    /**
     * Controller constructor.
     * @throws NotAuthorisedException
     */
    public function __construct()
    {
        if (!$this->isCorrectRequest()) {
            throw new NotAuthorisedException();
        }
    }

    private function isCorrectRequest()
    {
        $userId = RequestHelper::getHeader('USER_ID');
        $hash = RequestHelper::getHeader('USER_HASH');

        $access = ApiAccess::findOne($userId);
        return $access && Security::isValidHash(
            $hash,
            $access->user_key,
            RequestHelper::getAllRequestData()
        );
    }
}

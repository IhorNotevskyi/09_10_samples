<?php

namespace fb;

use fb\api\Api;

trait ApiTrait
{
    public function getApi()
    {
        $fbApi = new Api();
        $fbApi->login = 'my.page.fb';
        $fbApi->password = 'nnrresLLLsa112';

        return $fbApi;
    }
}
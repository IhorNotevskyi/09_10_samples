<?php

namespace google;

use google\api\Api;

trait ApiTrait
{
    public function getApi()
    {
        $googleApi = new Api();
        $googleApi->authHash = base64_encode('BASE64_HASH');

        return $googleApi;
    }
}

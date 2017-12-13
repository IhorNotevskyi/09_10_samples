<?php

use google\ApiTrait as GoogleApiTrait;
use fb\ApiTrait as FbApiTrait;

class Application
{
    use GoogleApiTrait, FbApiTrait {
        GoogleApiTrait::getApi insteadof FbApiTrait;
        FbApiTrait::getApi as getFbApi;
        GoogleApiTrait::getApi as getGoogleApi;
    }

    public function doSmth()
    {
        var_dump($this->getGoogleApi()->call(__METHOD__));
        var_dump($this->getFbApi()->call(__METHOD__));
    }

    public function doSmthElse()
    {
        var_dump($this->getGoogleApi()->call(__METHOD__));
        var_dump($this->getFbApi()->call(__METHOD__));
    }
}
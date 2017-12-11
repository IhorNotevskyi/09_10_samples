<?php

/**
 * Class Api
 */
class Api
{
    /**
     * @throws ApiLoginException
     * @throws ApiPasswordException
     */
    public function getData()
    {
        throw mt_rand(1, 2) % 2 ? new ApiLoginException() : new ApiPasswordException();
    }
}

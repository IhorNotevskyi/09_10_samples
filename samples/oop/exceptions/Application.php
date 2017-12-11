<?php

class Application
{
    public function doSomething()
    {
        try {
            $api = new Api();
            $api->getData();
        } catch (ApiLoginException $exception) {
            // Do Some actions
            throw new ApiException('Api is not working', 404, $exception);
        } catch (ApiPasswordException $exception) {
            // Do Some other actions
            throw new ApiException('Api is not working', 405, $exception);
        }
    }
}
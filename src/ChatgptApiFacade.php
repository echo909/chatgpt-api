<?php

namespace Echo909\ChatgptApi;

use Illuminate\Support\Facades\Facade;

class ChatgptApiFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'chatgpt-api';
    }
}

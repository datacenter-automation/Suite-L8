<?php

namespace App\Libraries\NetworkingTools\Facade;

use Illuminate\Support\Facades\Facade;

class NetTools extends Facade
{

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'nettools';
    }
}

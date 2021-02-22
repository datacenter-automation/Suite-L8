<?php

namespace App\Exceptions\Api;

use Symfony\Component\HttpFoundation\Response;

class NotImplementedException extends BaseException
{

    protected $code = Response::HTTP_NOT_IMPLEMENTED;

    protected $message = 'Not Implemented';
}
